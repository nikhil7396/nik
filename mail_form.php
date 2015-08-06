<style type="text/css">
<!--
body {
	background-color: #999999;
}
.style1 {
	color: #F0F0F0;
	font-weight: bold;
	font-size: xx-large;
}
body,td,th {
	font-size: medium;
	color: #000000;
}
-->
</style><table width="100%" height="554" border="0">

<form id="form2" name="form2" method="post" action="send_mail.php">
<input type="hidden" name="sendmail" value="send">
<tr>
<td align="right">
<img src="email.png" width="50" height="50" /></td>
<td><span class="style1">Email Service</span></td>
</tr>
<td></td>
  <!--<tr>
    <td width="303" height="117" align="right"><p class="style1">&nbsp;</p></td>
    <td width="213">&nbsp;</td>
  </tr>-->
  <tr>
  <td>&nbsp;</td>
    <td align="right">From : </td>
    <td width="770">
      <input type="email" name="from" required>    </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td align="right">To : </td>
    <td><input type="email" name="to" required></td>
  </tr> 
  <tr>
  <td>&nbsp;</td>
    <td align="right">Subject:</td>
    <td><input type="text" name="subject"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td align="right">Description : </td>
    <td>
      <label>
        <textarea name="description" rows="20" cols="50"></textarea>
        </label>    </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Send"></td>
  </tr>
  </form>
</table>
