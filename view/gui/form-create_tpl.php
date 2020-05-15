<form>

<p>
    <label>Course:</br>
    <select name="course">
        <option value="htmlphp" <?= isSelected("htmlphp", $course) ?>>htmlphp</option>
        <option value="javascript1" <?= isSelected("javascript1", $course) ?>>javascript1</option>
        <option value="linux" <?= isSelected("linux", $course) ?>>linux</option>
        <option value="oophp" <?= isSelected("oophp", $course) ?>>oophp</option>
        <option value="oopython" <?= isSelected("oopython", $course) ?>>oopython</option>
        <option value="python" <?= isSelected("python", $course) ?>>python</option>
        <option value="webgl" <?= isSelected("webgl", $course) ?>>webgl</option>
        <option value="dbjs" <?= isSelected("dbjs", $course) ?>>dbjs</option>
        <option value="databas" <?= isSelected("databas", $course) ?>>databas</option>
        <option value="vlinux" <?= isSelected("vlinux", $course) ?>>vlinux</option>
        <option value="unix" <?= isSelected("unix", $course) ?>>unix</option>
        <option value="webapp" <?= isSelected("webapp", $course) ?>>webapp</option>
    </select></label>
</p>

<p>
    <label>Lab:</br>
    <select name="lab">
        <option value="lab1" <?= isSelected("lab1", $lab) ?>>Lab 1</option>
        <option value="lab2" <?= isSelected("lab2", $lab) ?>>Lab 2</option>
        <option value="lab3" <?= isSelected("lab3", $lab) ?>>Lab 3</option>
        <option value="lab4" <?= isSelected("lab4", $lab) ?>>Lab 4</option>
        <option value="lab5" <?= isSelected("lab5", $lab) ?>>Lab 5</option>
        <option value="lab6" <?= isSelected("lab6", $lab) ?>>Lab 6</option>
        <option value="lab01" <?= isSelected("lab01", $lab) ?>>Lab 01 v2</option>
        <option value="lab02" <?= isSelected("lab02", $lab) ?>>Lab 02 v2</option>
        <option value="lab03" <?= isSelected("lab03", $lab) ?>>Lab 03 v2</option>
        <option value="lab04" <?= isSelected("lab04", $lab) ?>>Lab 04 v2</option>
        <option value="lab05" <?= isSelected("lab05", $lab) ?>>Lab 05 v2</option>
        <option value="lab06" <?= isSelected("lab06", $lab) ?>>Lab 06 v2</option>
        <option value="sql1" <?= isSelected("sql1", $lab) ?>>SQL 1</option>
        <option value="sql2" <?= isSelected("sql2", $lab) ?>>SQL 2</option>
        <option value="bash1" <?= isSelected("bash1", $lab) ?>>Bash 1</option>
        <option value="bash2" <?= isSelected("bash2", $lab) ?>>Bash 2</option>
        <option value="sed1" <?= isSelected("sed1", $lab) ?>>Sed 1</option>
        <option value="javascript1" <?= isSelected("javascript1", $lab) ?>>JavaScript 1</option>
        <option value="javascript2" <?= isSelected("javascript2", $lab) ?>>JavaScript 2</option>
        <option value="node1" <?= isSelected("node1", $lab) ?>>Node 1</option>
        <option value="node2" <?= isSelected("node2", $lab) ?>>Node 2</option>
        <option value="node3" <?= isSelected("node3", $lab) ?>>Node 3</option>
        <option value="labtest" <?= isSelected("labtest", $lab) ?>>Lab Test</option>
        <option value="jq" <?= isSelected("jq", $lab) ?>>jq</option>
        <option value="regex" <?= isSelected("regex", $lab) ?>>regex - bash</option>
    </select></label>
</p>

<p>
    <label>Lab version:</br>
    <select name="version">
        <option value="v1" <?= isSelected("v1", $labversion) ?>>v1</option>
        <option value="v2" <?= isSelected("v2", $labversion) ?>>v2</option>
        <option value="v3" <?= isSelected("v3", $labversion) ?>>v3</option>
    </select></label>
</p>

<p>
    <label>Acronym:<br>
        <input type="text" name="acronym" placeholder="Enter acronym" value="<?= $acronym ?>">
    </label>
</p>

<p>
    <input type="submit" name="doGenerate" value="Submit">
</p>

</form>
