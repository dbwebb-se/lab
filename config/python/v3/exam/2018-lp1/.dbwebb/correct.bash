python3 -m unittest -v test_dbwebb &> log

ALL_LINES=$(cat log | head -6)
echo "$ALL_LINES"

FIRST_LINE=$(cat log | head -1)
SECOND_LINE=$(cat log | head -2 | tail -1)
REST=$(cat log | head -6 | tail -4)
POINTS=0



if [[ $FIRST_LINE = *"... ok"* ]]; then
    echo "All modules and files are there"
fi

if [[ $SECOND_LINE = *"... ok"* ]]; then
    echo "Du klarade uppgift 1."
    POINTS=$((POINTS+1))
else
    echo "Du klarade inte uppgift 1 och är inte godkänd."
    exit 0
fi

POINTS=$(POINTS+$(echo "$REST" | tr " " "\n" | grep -c "... ok"))
