SQL för att testa exam-delen
============================

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2020-05-31 08:00:00", "2020-05-31 23:00:00"),
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2016-05-31 08:00:00", "2016-05-31 23:00:00"),
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-05-31 08:00:00", "2018-05-31 23:00:00"),
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-05-28 08:00:00", "2018-05-28 23:00:00"),
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-04-31 08:00:00", "2018-04-31 23:00:00")
;

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "2018-lp4", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-05-31 08:00:00", "2018-05-31 23:59:59"),
("databas", "2018-prepare", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (förbered dig).", 1*60*60, "1.0.0", "2018-05-30 08:00:00", "2018-05-30 23:59:59")
;


### Exam python

DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "lek", "prepare", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "examination", "exam", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2018-10-30 08:00:00", "2018-10-30 23:59:59"),
("python", "omexamination", "reexam1", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2019-01-10 08:00:00", "2019-01-10 23:59:59"),
("python", "restexamination", "reexam2", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2019-06-10 08:00:00", "2019-06-10 23:59:59")
;

<!-- INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "2018-lp1", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-10-30 08:00:00", "2018-10-30 23:59:59"),
("python", "prepare", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (förbered dig).", 1*60*60, "1.0.0", "2018-06-28 08:00:00", "2028-10-30 23:59:59")
; -->

#### Lek

DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "lek", "prepare", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "examination", "exam", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2018-10-30 23:59:59"),
("python", "omexamination", "reexam1", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2019-01-10 23:59:59"),
("python", "restexamination", "reexam2", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2019-06-10 23:59:59")
;



### Exam databas

DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "omexamination", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-08-31 08:00:00", "2018-08-31 23:59:59"),
("databas", "examination", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-05-31 08:00:00", "2018-05-31 23:59:59"),
("databas", "lek", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (träna och förbered dig).", 1*60*60, "1.0.0", "2018-07-30 08:00:00", "2018-08-30 23:59:59")
;



#### Older databas

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "2018-lp4 omex", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-08-31 08:00:00", "2018-08-31 23:59:59"),
("databas", "2018-prepare", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (förbered dig).", 1*60*60, "1.0.0", "2018-08-30 08:00:00", "2018-08-30 23:59:59")
;


select strftime("%s", (select ts from exam_log where acronym="mosstud" and examId=7 and action="Seal" order by ts desc limit 1)) - strftime("%s", (select ts from exam_log where acronym="mosstud" and examId=7 and action="Checkout" order by ts limit 1));


Hämta alla från en exam
------------------------

SELECT DISTINCT acronym, signature FROM exam_log WHERE examid=1;

SELECT
    acronym,
    signature,
    action,
    ts
FROM exam_log AS e
WHERE
    examid=1
ORDER BY acronym, ts ASC
;

--
SELECT
    strftime("%s", (SELECT ts FROM exam_log WHERE acronym="mostud" AND examId=7 AND action="Seal" ORDER BY ts DESC LIMIT 1)) - strftime("%s", (SELECT ts FROM exam_log WHERE acronym="mostud" AND examId=7 AND action="Checkout" ORDER BY ts LIMIT 1));

SELECT
    *
FROM (SELECT DISTINCT acronym, name FROM exam_log WHERE examid=1) AS e
;
