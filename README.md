<h1>Welcome to the iChing API 0.2.0</h1>
<p>
  This API content is sourced from the Wilhelm / Baynes translation of the iChing.
  This is an imperfect project which is likely to have errors, please feel free to contact me with any corrections.
  <br/><br/>
  Returned sequences for the lines go from bottom to top 123456 where 1 is the first (bottom) line and 6 is the last (top) line
</p>

<h2>Usage</h2>
<h3>/hexagram?cast=threecoin&lines=997867</h3>
<ul>
  <li><b>pre>?lines=997876</pre></b>Get hexagram (6,7,8,9 notation))</li>
  <li><b><pre>?cast=yarrow</pre></b>Get hexagram Method (threecoin|yarrow)</li>
</ul>

<h2>Payload</h2>
<ul>
  <b>numbers</b>
  <br/><br/>
  The aged numbers for each line the hexagram represented as 6,7,8, or 9
</ul>
<ul>
  <b>upperTrigram</b>
  <br/><br/>
  Name of the upper trigram
</ul>
<ul>
  <b>lowerTrigram</b>
  <br/><br/>
  Name of the lower trigram
</ul>
<ul>
  <b>title</b>
  <br/><br/>
  English title of the hexagram
</ul>
<ul>
  <b>chineseTitle</b>
  <br/><br/>
  Chinese transliterated title of the hexagram
</ul>
<ul>
  <b>image</b>
  <br/><br/>
  Text of the image
</ul>
<ul>
  <b>judgement</b>
  <br/><br/>
  Text of the judgement
</ul>
<ul>
  <b>lines</b>
  <br/><br/>
  Text of the lines
</ul>
<ul>
  <b>unicodeCharacter</b>
  <br/><br/>
  Hexagram unicode character
</ul>
<ul>
  <b>number</b>
  <br/><br/>
  Hexagram number 1-64
</ul>
<ul>
  <b>description</b>
  <br/><br/>
  Text of the Wilhelm / Baynes description for the hexagram
</ul>
<ul>
  <b>descriptionJudgement</b>
  <br/><br/>
  Text of the Wilhelm / Baynes description for the judgement
</ul>
<ul>
  <b>descriptionImage</b>
  <br/><br/>
  Text of the Wilhelm / Baynes description for the image
</ul>
<ul>
  <b>descriptionLines</b>
  <br/><br/>
  Text of the Wilhelm / Baynes description for the lines (only returns descriptions for lines in the reading)
</ul>
