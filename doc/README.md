SQL för att testa exam-delen
============================



Rapporter
------------------------

```text
--
-- Set output formatting
--
.header on
.mode column



--
-- Visa alla exams
--
SELECT * FROM exam;
SELECT * FROM exam WHERE course = 'databas';
SELECT * FROM exam WHERE
    start <= datetime('now')
    AND stop >= datetime('now')
    AND course = 'databas'
;



--
-- Show only details on the used signatures, for a particular examid
--
SELECT DISTINCT
    acronym,
    signature
FROM exam_log
WHERE
    examid=9
;

SELECT DISTINCT
    acronym,
    signature
FROM exam_log
WHERE
    examid=9 AND acronym='johv18';


--
-- Details from log, for a particular examid
--
SELECT
    acronym,
    signature,
    action,
    ts
FROM exam_log AS e
WHERE
    examid=9 AND acronym='johv18'
ORDER BY acronym, ts ASC
;



--
-- Uncertain...
--
SELECT
    strftime("%s", (SELECT ts FROM exam_log WHERE acronym="mosstud" AND examId=8 AND action="Seal" ORDER BY ts DESC LIMIT 1)) - strftime("%s", (SELECT ts FROM exam_log WHERE acronym="mosstud" AND examId=8 AND action="Checkout" ORDER BY ts LIMIT 1));



--
-- Does not work...
--
SELECT
    *
FROM (SELECT DISTINCT acronym, name FROM exam_log WHERE examid=1) AS e
;
```



Python
-------------------------------------

### Exam python 2021

```
DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "kmom10", "prep", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "kmom10", "try1", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2021-10-27 08:00:00", "2021-10-27 23:59:59"),
("python", "kmom10", "try2", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2022-01-07 08:00:00", "2022-01-07 23:59:59"),
("python", "kmom10", "try3", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2022-06-02 08:00:00", "2022-06-02 23:59:59")
;
```



### Exam python 2020

```
DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "kmom10", "prep", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "kmom10", "try1", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2020-10-27 08:00:00", "2020-10-27 23:59:59"),
("python", "kmom10", "try2", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2021-01-07 08:00:00", "2021-01-07 23:59:59"),
("python", "kmom10", "try3", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2021-06-08 08:00:00", "2021-06-08 23:59:59")
;
```



### Exam python 2019

```
DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "kmom10", "prep", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "kmom10", "try1", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2019-10-28 08:00:00", "2019-10-28 23:59:59"),
("python", "kmom10", "try2", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2020-01-09 08:00:00", "2020-01-09 23:59:59"),
("python", "kmom10", "try3", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2020-06-10 08:00:00", "2020-06-10 23:59:59")
;
```



### Exam python 2018

```
DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "prep", "prep", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "try1", "try1", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2018-10-30 08:00:00", "2018-10-30 23:59:59"),
("python", "try2", "try2", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2019-01-10 08:00:00", "2019-01-10 23:59:59"),
("python", "try3", "try3", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2019-06-10 08:00:00", "2019-06-10 23:59:59")
;

<!-- INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "2018-lp1", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-10-30 08:00:00", "2018-10-30 23:59:59"),
("python", "prepare", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (förbered dig).", 1*60*60, "1.0.0", "2018-06-28 08:00:00", "2028-10-30 23:59:59")
; -->
```



#### Lek

```
DELETE FROM exam WHERE course="python";
SELECT * FROM exam WHERE course="python";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("python", "prep", "prep", "Programmeringstenta", "Programmeringstenta, träna och förbered dig.", 1*60*60, "1.0.0", "2018-09-01 08:00:00", "2028-09-01 23:59:59"),
("python", "try1", "try1", "Programmeringstenta", "Programmeringstenta, försök 1.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2019-10-30 23:59:59"),
("python", "try2", "try2", "Programmeringstenta", "Programmeringstenta, försök 2.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2028-01-10 23:59:59"),
("python", "try3", "try3", "Programmeringstenta", "Programmeringstenta, försök 3.", 5*60*60, "1.0.0", "2018-08-30 08:00:00", "2028-06-10 23:59:59")
;
```



Databas
-------------------------------------

``
select * from exam where course="databas";
```



### Exam databas 2022

```
DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "kmom10", "prep", "Tentamen", "Träna och förbered dig.", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2029-09-01 23:59:59"),
("databas", "kmom10", "try1", "Tentamen", "Försök 1 (tenta).", 5*60*60, "1.0.0", "2022-03-24 09:00:00", "2022-03-24 23:59:59"),
("databas", "kmom10", "try2", "Tentamen", "Försök 2 (omtenta).", 5*60*60, "1.0.0", "2022-05-27 09:00:00", "2022-05-27 23:59:59"),
("databas", "kmom10", "try3", "Tentamen", "Försök 3 (resttenta).", 5*60*60, "1.0.0", "2022-08-26 09:00:00", "2022-08-26 23:59:59")
;
```



### Exam databas 2021

```
DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "kmom10", "prep", "Tentamen", "Träna och förbered dig.", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2029-09-01 23:59:59"),
("databas", "kmom10", "try1", "Tentamen", "Försök 1 (tenta).", 5*60*60, "1.0.0", "2021-03-24 09:00:00", "2021-03-24 23:59:59"),
("databas", "kmom10", "try2", "Tentamen", "Försök 2 (omtenta).", 5*60*60, "1.0.0", "2021-05-28 09:00:00", "2021-05-28 23:59:59"),
("databas", "kmom10", "try3", "Tentamen", "Försök 3 (resttenta).", 5*60*60, "1.0.0", "2021-08-27 09:00:00", "2021-08-27 23:59:59")
;
```



### Exam databas 2020

```
DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "kmom10", "prep", "Tentamen", "Träna och förbered dig.", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2029-09-01 23:59:59"),
("databas", "kmom10", "try1", "Tentamen", "Försök 1 (tenta).", 5*60*60, "1.0.0", "2020-03-26 09:00:00", "2020-03-26 23:59:59"),
("databas", "kmom10", "try2", "Tentamen", "Försök 2 (omtenta).", 5*60*60, "1.0.0", "2020-05-29 09:00:00", "2020-05-29 23:59:59"),
("databas", "kmom10", "try3", "Tentamen", "Försök 3 (resttenta).", 5*60*60, "1.0.0", "2020-08-28 09:00:00", "2020-08-28 23:59:59")
;
```



### Exam databas 2019

```
DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "kmom10", "prep", "Tentamen", "Träna och förbered dig.", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2029-09-01 23:59:59"),
("databas", "kmom10", "try1", "Tentamen", "Försök 1 (tenta).", 5*60*60, "1.0.0", "2019-03-28 09:00:00", "2019-03-28 23:59:59"),
("databas", "kmom10", "try2", "Tentamen", "Försök 2 (omtenta).", 5*60*60, "1.0.0", "2019-05-31 09:00:00", "2019-05-31 23:59:59"),
("databas", "kmom10", "try3", "Tentamen", "Försök 3 (resttenta).", 5*60*60, "1.0.0", "2019-08-30 09:00:00", "2019-08-30 23:59:59")
;
```

För test och utveckling.

```
INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "kmom10", "prep", "Tentamen", "Träna och förbered dig.", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2029-09-01 23:59:59"),
("databas", "kmom10", "try1", "Tentamen", "Försök 1 (tenta).", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2019-03-28 23:59:59"),
("databas", "kmom10", "try2", "Tentamen", "Försök 2 (omtenta).", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2019-05-31 23:59:59"),
("databas", "kmom10", "try3", "Tentamen", "Försök 3 (resttenta).", 5*60*60, "1.0.0", "2019-03-05 09:00:00", "2019-08-30 23:59:59")
;
```



### Exam databas 2018

```
DELETE FROM exam WHERE course="databas";
SELECT * FROM exam WHERE course="databas";

INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "omexamination", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-08-31 08:00:00", "2018-08-31 23:59:59"),
("databas", "examination", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-05-31 08:00:00", "2018-05-31 23:59:59"),
("databas", "lek", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (träna och förbered dig).", 1*60*60, "1.0.0", "2018-07-30 08:00:00", "2018-08-30 23:59:59")
;
```



### Older databas

```
INSERT INTO exam
(course, courseEvent, target, type, description, timelimit, version, start, stop)
VALUES
("databas", "2018-lp4 omex", "exam", "Programmeringstenta", "Programmeringstenta som del i examination.", 5*60*60, "1.0.0", "2018-08-31 08:00:00", "2018-08-31 23:59:59"),
("databas", "2018-prepare", "exam", "Programmeringstenta", "Programmeringstenta som del i examination (förbered dig).", 1*60*60, "1.0.0", "2018-08-30 08:00:00", "2018-08-30 23:59:59")
;


select strftime("%s", (select ts from exam_log where acronym="mosstud" and examId=7 and action="Seal" order by ts desc limit 1)) - strftime("%s", (select ts from exam_log where acronym="mosstud" and examId=7 and action="Checkout" order by ts limit 1));
```



Old
-------------------------------------

```
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
```
