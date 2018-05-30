LÄS MIG FÖRST
================================

Detta är den individuella examinationen i kursen databas, det är en del av kmom10 och delmomentet heter "exam". 

Se till att du har senaste versionen av kommandot `dbwebb`.

```
dbwebb selfupdate
```

Du skall använda kommandot `dbwebb exam` för att hämta ut och lämna in din examination. Du kan läsa mer om kommandot `dbwebb exam` via:

```
dbwebb exam help
```



Förberedelser inför examinationen
--------------------------------

Se till att katalogen `me/kmom10/exam` är tom.

Om du har gjort en tidigare examination kan du ta en kopia av katalogen och sedan tömma den.

```
# Du står i kursrepots root
cd me/kmom10 \
    && mv exam exam$$ \
    && mkdir exam \
    && cd exam 
```

Du kan lista om det finns en aktiv examination.

```
dbwebb exam list
```



Påbörja examinationen
--------------------------------

Du påbörjar examinationen genom att checka ut (checkout/start) och påbörja din examination.

```
dbwebb exam checkout exam
```

Blir något fel kan du checka ut igen. Tiden räknas från din första utcheckning.



Under pågående examination
--------------------------------

Du kan löpande validera `dbwebb validate` och publicera `dbwebb publish` som vanligt.

Du kan när som hämta ett kvitto på din pågående examination och se detaljer om den, till exempel hur länge du hållit på.

```
dbwebb exam receipt exam
```



Avsluta examinationen
--------------------------------

När du är klar lämnar du in genom att försegla (seal/stop) din examination.

```
dbwebb exam seal exam
```

Blir något fel så kan du försegla och lämna in igen, det är din sista inlämning som räknas.



Filer
--------------------------------

Följande filer genereras när du använder `dbwebb exam`.

| Fil                            | Innehåll                                |
|--------------------------------|-----------------------------------------|
| `INSTRUKTION.md`               | Instruktionen till examinationen och uppgiften som skall utföras. |
| `README_FIRST`                 | Denna filen med information om förfarandet. |
| `.dbwebb_exam/FILES.txt`       | En lista av alla filer som ligger i katalogen, genereras vid `checkout` och `seal`. |
| `.dbwebb_exam/RECEIPT.md`      | Ett kvitto på dina aktiviteter, samma information som du kan hämta med `dbwebb exam receipt <target>`. |
| `.dbwebb_exam/RECEIPT.md.sha1` | En hash på motsvarande fil. | 
