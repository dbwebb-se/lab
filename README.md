Generate programming labs
===================

Used to generate programming labs in courses.

You need special access for the source of the labs, once gained access you can check it out as a submodule.

```
$ alias gsu='git submodule update --init --recursive'
$ gsu
```



## Setup production environment

```
git clone git@github.com:dbwebb-se/lab.git lab.dbwebb.se
cd lab.dbwebb.se
git submodule update --init --recursive
composer install

make site-build
make local-publish

make virtual-host

make ssl-cert-create
make virtual-host-https
```



```                                                            
 .                                                             
..:  Copyright (c) 2014-2021 Mikael Roos, mos@dbwebb.se   
```                                                            
