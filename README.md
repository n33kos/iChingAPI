<h1>iChing API 0.2.0</h1>
<p>
  iChing API returns JSON payloads containing a specific or random iChing reading.
  <br/><br/>
  Content is sourced from the Wilhelm / Baynes translation of the iChing.
  This is an imperfect project which is likely to have errors, please feel free to submit issues or pull requests with corrections.
  <br/><br/>
  Returned sequences for the lines go from bottom to top 123456 where 1 is the first (bottom) line and 6 is the last (top) line
</p>

<h2>Usage</h2>
<h3>/hexagram?cast={cast_type}|?lines={specifi lines}</h3>
<ul>
  <li><b><pre>?lines=997876</pre></b>Get specific hexagram (6,7,8,9 notation))</li>
  <li><b><pre>?cast=yarrow</pre></b>Get random hexagram using method (threecoin|yarrow)</li>
</ul>

<h2>Payload</h2>
</ul>
  <li>
    <b>numbers</b>
    <br/><br/>
    The aged numbers for each line the hexagram represented as 6,7,8, or 9
  </li>
  <li>
    <b>upperTrigram</b>
    <br/><br/>
    Name of the upper trigram
  </li>
  <li>
    <b>lowerTrigram</b>
    <br/><br/>
    Name of the lower trigram
  </li>
  <li>
    <b>title</b>
    <br/><br/>
    English title of the hexagram
  </li>
  <li>
    <b>chineseTitle</b>
    <br/><br/>
    Chinese transliterated title of the hexagram
  </li>
  <li>
    <b>image</b>
    <br/><br/>
    Text of the image
  </li>
  <li>
    <b>judgement</b>
    <br/><br/>
    Text of the judgement
  </li>
  <li>
    <b>lines</b>
    <br/><br/>
    Text of the lines
  </li>
  <li>
    <b>unicodeCharacter</b>
    <br/><br/>
    Hexagram unicode character
  </li>
  <li>
    <b>number</b>
    <br/><br/>
    Hexagram number 1-64
  </li>
  <li>
    <b>description</b>
    <br/><br/>
    Text of the Wilhelm / Baynes description for the hexagram
  </li>
  <li>
    <b>descriptionJudgement</b>
    <br/><br/>
    Text of the Wilhelm / Baynes description for the judgement
  </li>
  <li>
    <b>descriptionImage</b>
    <br/><br/>
    Text of the Wilhelm / Baynes description for the image
  </li>
  <li>
    <b>descriptionLines</b>
    <br/><br/>
    Text of the Wilhelm / Baynes description for the lines (only returns descriptions for lines in the reading)
  </li>
</ul>

<h2>Database</h2>
<p>
  This API uses a sqlite database to store the iChing content which can be found in the main directory: `./iChing.sqlite`. Feel free to extract and use that database as you like. If you end up using it for multiple projects it may be wise to set up a separate repo containing only the database so its easier to update many consumers with corrections.
</p>

<h2>To Do</h2>
<ul>
  <li>
    Find a way to cleanly add the readings for "all lines 9" or "All lines 6" on hexagrams 1 and 2. These have been excluded for now.
  </li>
  <li>
    Implement versioning to allow upgrades without breaking old clients
  </li>
  <li>
    Port from PHP to something a more modern and less butts.
  </li>
</ul>
