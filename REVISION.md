Revision history
===================



v3.1.* (2018-08-31)
-------------------

* Fix showing exams that passed.



v3.1.0 (2018-08-17)
-------------------

* Moving around files into directory structure to prepare for running on lab.dbwebb.se.



v3.0.0 (2018-06-29)
-------------------

* Splitting the source to the labs in config/ and put into its own private repo and using as submodule.



v2.4.1 (2018-06-29)
-------------------

* Before splitting the source to the labs and put into its own private repo and using as submodule.



v2.4.0 (2018-05-30)
-------------------

* Added support for dbwebb exam and databas exam in 2018-lp4 and 2018-prepare.



v2.3.11 (2018-02-17)
-------------------

* PHP 7.2 md5_to_int convert string to intval.


v2.3.10 (2018-02-12)
-------------------

* Fix #92 To add support for points in node labs.
* Fix #89 Wrong calculation of total number of tasks in javascript labs.


v2.3.9 (2017-12-28)
-------------------

* Adding course databas.


v2.3.8 (2017-10-19)
-------------------

* Format text in wrap() to avoid markdown code segments.


v2.3.7 (2017-10-19)
-------------------

* Fix validation errors in javascript1 v2.


v2.3.6 (2017-10-19)
-------------------

* Link all webgl v2-labs to javascript1 v2.
* Update javascript1 lab1, 2, 3 with minor edits after review.


v2.3.5 (2017-10-17)
-------------------

* Copy javascrip1 labs to webgl och walk through lab 1 and 2.
* Add webgl lab 1-5.


v2.3.4 (2017-10-09)
-------------------

* Feature javascript labs with points and well done.


v2.3.3 (2017-06-12)
-------------------

* Add lab htmlphp lab6.


v2.3.2 (2017-06-12)
-------------------

* Enabled Python labs to be pass/pass w distinction.


v2.3.1 (2017-06-12)
-------------------

* Enabled PHP labs to be pass/pass w distinction.


v2.3.0 (2017-06-09)
-------------------

* Introduced versioning of labs and integrated with dbwebb-cli 2.0.


v2.2.31 (2017-02-27)
-------------------

* Add lab node2 to dbjs.


v2.2.30 (2017-02-14)
-------------------

* Add lab sql2 to dbjs.


v2.2.29 (2017-02-14)
-------------------

* Make node labs work without babel.
* Add lab node1 to dbjs.
* Bash assert add function to check if command is installed.


v2.2.28 (2017-02-01)
-------------------

* Test dbjs sql1 and made it work.


v2.2.27 (2017-01-24)
-------------------

* Rewrote python asserts to be pythonic.


v2.2.26 (2017-01-20)
-------------------

* Disabled jshint maxcomplexity in JavaScript client labs.


v2.2.25 (2017-01-16)
-------------------

* Adding dbjs javascript2.


v2.2.24 (2017-01-16)
-------------------

* Publish dbjs sql1.
* Make oopython lab1 pass validation.


v2.2.23 (2017-01-05)
-------------------

* Make nodejs assert pass enhanced validation.
* Change intendation on javascript1/dbjs lab1 to pass validation.
* Adding lab dbjs javascript1.


v2.2.22 (2017-01-04)
-------------------

* Enable to copy directory structure in lab_extra.


v2.2.21 (2016-10-07)
-------------------

* Corrected text in sql1 section 5.2.


v2.2.20 (2016-09-29)
-------------------

* Corrected sql1 section 5.


v2.2.19 (2016-09-27)
-------------------

* Updated and corrected sql1 after tests.


v2.2.18 (2016-09-26)
-------------------

* Corrected linux 1.5 was wrong in answers.
* Corrected locale in linux lab1.


v2.2.17 (2016-09-26)
-------------------
* Tested and minor updates to lab sql1.



v2.2.16 (2016-08-17)
-------------------

* Update with new version of CTextFilter.


v2.2.15 (2016-05-31)
-------------------

* Adding sql lab1.
* Improving bash assert to work with sqlite.


v2.2.14 (2016-05-25)
-------------------

* Improving gui separating menu items.
* Added support for SQLite labs together with htmlphp lab6.


v2.2.13 (2016-05-18)
-------------------

* Type hinting on JavaScript labs when using hint.
* Updating structure for labs using HTML/JavaScript.
* Adding support for labs in Node js.


v2.2.12 (2016-05-18)
-------------------

* Converted python labs to Markdown.
* Improved usability in index.php when creating labs, form remembers last input.


v2.2.11 (2016-05-18)
-------------------

* Allow responses to contain HTML and print it out correctly in the HTML template.


v2.2.10 (2016-05-18)
-------------------

* Labtexts in linux and htmlphp is now formatted as Markdown.


v2.2.9 (2016-05-18)
-------------------

* Lab texts now formatted as Markdown.
* Added `header` to lab specs to write additional code at top of generated cli-lab to include/execute extra code. Supported in bash, py and php.


v2.2.8 (2016-05-16)
v2.2.7 (2016-05-16)
-------------------

* Update exit status for CDbwebb.php.


v2.2.6 (2016-05-16)
-------------------

* Changed exit status to 42 when labs are not yet done.


v2.2.5 (2016-05-13)
-------------------

* Rechanging path for including CDbwebb.php


v2.2.2-4 (2016-05-13)
-------------------

* Made Dbwebb.py pass pylint.


v2.2.1 (2016-05-13)
-------------------

* Correct bug oopython/lab1.
* Changed install path for answer.json and CDbwebb.php.


v2.2.0 (2016-05-12)
-------------------

* Major rewrite of lab creation, now creating bundle.tar.
* Added support for bash-labs.


v2.1.0 (2015-09-29)
-------------------

* Major rewrite of frontend.


v2.0.1 (2015-09-29)
-------------------

* Tagging before major rewrite.


v2.0.0 (2015-08-17)
-------------------

* Added support for PHP labs and integrated with htmlphp-labs.
* Hint and answer is now printed as json to visualize the type.
* Added info on lab and section in labfile.
* Added summary at the end and exit with status 0 (success) or 1 (failed).
* Lots of small fixes for readability
* Added htmlphp as course
* Corrected conversion error in answer.py
* Added extras as own link  and suport for lab6 in python.
* Started work in april 2014, planned release end of august 2014.
