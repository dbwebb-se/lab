--
-- http://bits.swebowl.se/Matches/ShowCup.aspx?CupId=613
--
DROP TABLE IF EXISTS Games;
CREATE TABLE Games
(
    id INTEGER PRIMARY KEY,
    name TEXT,
    start DATETIME,
    teamA TEXT,
    teamB TEXT,
    scoreA INTEGER,
    scoreB INTEGER,
    score TEXT
);

INSERT INTO Games
    (name, start, teamA, teamB, scoreA, scoreB, score)
    VALUES
    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=301
    ("Semifinal A", "2016-04-08 20:20", "Team Pergamon BC", "BK Jösse", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114786"),
    ("Semifinal A", "2016-04-09 12:20", "BK Jösse", "Team Pergamon BC", 2, 18, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114787"),
    ("Semifinal A", "2016-04-09 19:00", "Team Pergamon BC", "BK Jösse", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114788"),

    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=302
    ("Semifinal B", "2016-04-08 17:00", "Team Clan BK", "Team Alingsas BC", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114790"),
    ("Semifinal B", "2016-04-09 09:00", "Team Alingsas BC", "Team Clan BK", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114791"),
    ("Semifinal B", "2016-04-09 15:40", "Team Clan BK", "Team Alingsas BC", 11, 4, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114792"),

    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=201
    ("Final", "2016-04-10 09:00", "Team Pergamon BC", "Team Clan BK", 8, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115167"),
    ("Final", "2016-04-10 12:20", "Team Clan BK", "Team Pergamon BC", 8, 12, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115168"),
    ("Final", "2016-04-10 15:40", "Team Pergamon BC", "Team Clan BK", 9, 10, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115169")
;

-- Visa med header, kolumnnamn
.header on

-- Visa kolumner för tydligare utskrift
.mode columns

-- Inspektera datat
SELECT * FROM Games;
