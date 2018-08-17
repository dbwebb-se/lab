#!/usr/bin/make -f
#
# Build website with environment
#
#

# Colors
NO_COLOR		= \033[0m
TARGET_COLOR	= \033[32;01m
OK_COLOR		= \033[32;01m
ERROR_COLOR		= \033[31;01m
WARN_COLOR		= \033[33;01m
ACTION			= $(TARGET_COLOR)--> 
HELPTEXT 		= "$(ACTION)" `egrep "^\# target: $(1) " Makefile | sed "s/\# target: $(1)[ ]\+- / /g"` "$(NO_COLOR)"

WWW_SITE	:= lab.dbwebb.se
WWW_LOCAL	:= local.$(WWW_SITE)
SERVER_ADMIN := mos@$(WWW_SITE)
BASE_URL    = https://$(WWW_SITE)/

GIT_BASE 	= $(HOME)/git/lab
HTDOCS_BASE = $(HOME)/htdocs
LOCAL_HTDOCS = $(HTDOCS_BASE)/$(WWW_SITE)

# Certificates for https
SSL_APACHE_CONF = /etc/letsencrypt/options-ssl-apache.conf
SSL_PEM_BASE 	= /etc/letsencrypt/live/$(WWW_SITE)

# Publish
EXCLUDE_ON_PUBLISH = --exclude old --exclude backup --exclude .git --exclude error.log --exclude cache --exclude access.log --exclude data --delete

# Backup
TODAY = `date +'%y%m%d'`



# target: help - Displays help.
.PHONY:  help
help:
	@echo $(call HELPTEXT,$@)
	@echo "make [target] ..."
	@echo "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: update-all - Update codebase and publish by clearing the cache.
.PHONY: update-all
update-all: codebase-update submodule-update site-build local-publish-clear
	@echo $(call HELPTEXT,$@)



# target: update - Update codebase (no submodules) and publish by clearing the cache.
.PHONY: update
update: codebase-update site-build local-publish-clear
	@echo $(call HELPTEXT,$@)



# target: production-publish - Publish latest to the production server.
production-publish:
	@echo $(call HELPTEXT,$@)
	ssh -p 2222 mos@$(WWW_SITE) -t "cd $(GIT_BASE) && git pull && make update"



# target: local-publish     - Publish website to local host.
.PHONY: local-publish
local-publish:
	@echo $(call HELPTEXT,$@)
	rsync -av $(EXCLUDE_ON_PUBLISH) config view vendor style config.php functions.php $(LOCAL_HTDOCS)
	[ -h $(LOCAL_HTDOCS)/data ] || ln -s ../../git/lab/data $(LOCAL_HTDOCS)



# target: local-publish-clear - Publish website to local host and clear the cache.
.PHONY: local-publish-clear
local-publish-clear: local-publish
	@echo $(call HELPTEXT,$@)



# target: codebase-update    - Update codebase.
.PHONY: codebase-update
codebase-update:
	@echo $(call HELPTEXT,$@)
	git pull
	composer install



# target: submodule-init      - Init all submodules.
# target: submodule-update    - Update all submodules.
.PHONY: submodule-init submodule-update
submodule-init:
	-git submodule update --init --recursive 

submodule-update:
	-git pull --recurse-submodules && git submodule foreach git pull origin master



# target: backup              - Take a backup of database and other essentials.
.PHONY: backup
backup:
	@echo $(call HELPTEXT,$@)
	#install --directory backup/$(TODAY)



# target: site-build   - Create essential directories and copy from vendor.
.PHONY: site-build
site-build:
	#



# target: etc-hosts - Create a entry in the /etc/hosts for local access.
.PHONY: etc-hosts
etc-hosts:
	echo "127.0.0.1 $(WWW_LOCAL)" | sudo bash -c 'cat >> /etc/hosts'
	@tail -1 /etc/hosts



# target: ssl-cert-create - One way to create the certificates.
.PHONY: ssl-cert-create
ssl-cert-create:
	#cd $(HOME)/git/letsencrypt
	#./letsencrypt-auto certonly --standalone -d $(WWW_SITE) -d www.$(WWW_SITE)
	sudo certbot certonly --standalone -d $(WWW_SITE) -d www.$(WWW_SITE)



# target: ssl-cert-update - Update certificates with new expiray date.
.PHONY: ssl-cert-renew
ssl-cert-renew:
	#cd $(HOME)/git/letsencrypt
	#./letsencrypt-auto renew
	sudo certbot renew


# target: install-fresh - Do a fresh installation of a new server.
.PHONY: install-fresh
install-fresh: etc-hosts virtual-host update



# target: virtual-host - Create entries for the virtual host http.
.PHONY: virtual-host

define VIRTUAL_HOST_80
Define site $(WWW_SITE)
ServerAdmin $(SERVER_ADMIN)

<VirtualHost *:80>
	ServerName $${site}
	ServerAlias local.$${site}
	ServerAlias do1.$${site}
	ServerAlias do2.$${site}
	ServerAlias bth1.$${site}
	DocumentRoot $(HTDOCS_BASE)/$${site}/htdocs

	<Directory />
		Options Indexes FollowSymLinks
		AllowOverride All
		Require all granted
		Order allow,deny
		Allow from all

		#Options +ExecCGI
		#AddHandler cgi-script .cgi
	</Directory>

	<FilesMatch "\.(jpe?g|png|gif|js|css|svg|ttf|otf|eot|woff|woff2|ico)$">
		ExpiresActive On
		ExpiresDefault "access plus 1 week"
	</FilesMatch>

	<FilesMatch "\.(jpe?g|png|gif|js|css|svg|ttf|otf|eot|woff|woff2|ico)$">
		ExpiresActive On
		ExpiresDefault "access plus 1 week"
	</FilesMatch>

	#Include $(HTDOCS_BASE)/$${site}/config/apache-redirects
	#Include $(HTDOCS_BASE)/$${site}/config/apache-rewrites 

	#LogLevel alert rewrite:trace6
	# tail -f error.log | fgrep '[rewrite:'

	ErrorLog  $(HTDOCS_BASE)/$${site}/error.log
	CustomLog $(HTDOCS_BASE)/$${site}/access.log combined
</VirtualHost>
endef
export VIRTUAL_HOST_80

define VIRTUAL_HOST_80_WWW
Define site $(WWW_SITE)
ServerAdmin $(SERVER_ADMIN)

<VirtualHost *:80>
	ServerName www.$${site}
	Redirect "/" "http://$${site}/"
</VirtualHost>
endef
export VIRTUAL_HOST_80_WWW

virtual-host:
	install --directory $(LOCAL_HTDOCS)/htdocs
	echo "$$VIRTUAL_HOST_80" | sudo bash -c 'cat > /etc/apache2/sites-available/$(WWW_SITE).conf'
	echo "$$VIRTUAL_HOST_80_WWW" | sudo bash -c 'cat > /etc/apache2/sites-available/www.$(WWW_SITE).conf'
	sudo a2ensite $(WWW_SITE) www.$(WWW_SITE)
	#sudo a2enmod rewrite expires cgi
	sudo a2enmod rewrite expires
	sudo apachectl configtest
	sudo service apache2 reload



# target: virtual-host-https - Create entries for the virtual host https.
.PHONY: virtual-host-https

define VIRTUAL_HOST_443
Define site $(WWW_SITE)
ServerAdmin $(SERVER_ADMIN)

<VirtualHost *:80>
	ServerName $${site}
	ServerAlias do1.$${site}
	ServerAlias do2.$${site}
	ServerAlias bth1.$${site}
	Redirect "/" "https://$${site}/"
</VirtualHost>

<VirtualHost *:443>
	Include $(SSL_APACHE_CONF)
	SSLCertificateFile 		$(SSL_PEM_BASE)/cert.pem
	SSLCertificateKeyFile 	$(SSL_PEM_BASE)/privkey.pem
	SSLCertificateChainFile $(SSL_PEM_BASE)/chain.pem

	ServerName $${site}
	ServerAlias do1.$${site}
	ServerAlias do2.$${site}
	DocumentRoot $(HTDOCS_BASE)/$${site}/htdocs

	<Directory />
		Options Indexes FollowSymLinks
		AllowOverride All
		Require all granted
		Order allow,deny
		Allow from all

		#Options +ExecCGI
		#AddHandler cgi-script .cgi
	</Directory>

	<FilesMatch "\.(jpe?g|png|gif|js|css|svg|ttf|otf|eot|woff|woff2|ico)$">
		ExpiresActive On
		ExpiresDefault "access plus 1 week"
	</FilesMatch>

	#Include $(HTDOCS_BASE)/$${site}/config/apache-redirects
	#Include $(HTDOCS_BASE)/$${site}/config/apache-rewrites 

	#LogLevel alert rewrite:trace6
	# tail -f error.log | fgrep '[rewrite:'

	ErrorLog  $(HTDOCS_BASE)/$${site}/error.log
	CustomLog $(HTDOCS_BASE)/$${site}/access.log combined
</VirtualHost>
endef
export VIRTUAL_HOST_443

define VIRTUAL_HOST_443_WWW
Define site $(WWW_SITE)
ServerAdmin $(SERVER_ADMIN)

<VirtualHost *:80>
	ServerName www.$${site}
	Redirect "/" "https://www.$${site}/"
</VirtualHost>

<VirtualHost *:443>
	Include $(SSL_APACHE_CONF)
	SSLCertificateFile 		$(SSL_PEM_BASE)/cert.pem
	SSLCertificateKeyFile 	$(SSL_PEM_BASE)/privkey.pem
	SSLCertificateChainFile $(SSL_PEM_BASE)/chain.pem

	ServerName www.$${site}
	Redirect "/" "https://$${site}/"
</VirtualHost>
endef
export VIRTUAL_HOST_443_WWW

virtual-host-https:
	echo "$$VIRTUAL_HOST_443" | sudo bash -c 'cat > /etc/apache2/sites-available/$(WWW_SITE).conf'
	echo "$$VIRTUAL_HOST_443_WWW" | sudo bash -c 'cat > /etc/apache2/sites-available/www.$(WWW_SITE).conf'
	sudo a2enmod ssl
	sudo apachectl configtest
	sudo service apache2 reload
