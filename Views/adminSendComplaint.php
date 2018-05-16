
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Update Complaint</title>

            <script language="javascript" type="text/javascript">
                    function f2()
                    {
                        window.close();
                    }
                    function f3()
                    {
                        window.print();
                    }
                </script>
        </head>
        <body>

            <div style="margin-left:50px;">
                <form name="sendcomplaint" id="sendcomplaint" method="post"> 
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td  >&nbsp;</td>
                            <td >&nbsp;</td>
                        </tr>
                        <tr height="50">
                            <td><b>Complaint Number</b></td>
                            <td><?php echo htmlentities($_GET['cid']); ?></td>
                    </tr>
                    <tr height="50">
                        <td><b>Department</b></td>
                        <td><select name="dept[]" id='dept' multiple="multiple"  class="selectpicker" required="required">
                               
                                <option value="Police Department">Police Department</option>
                                <option value="Fire Department">Fire Department</option>

                            </select></td>
                    </tr>


                   



                    <tr height="50">
                        <td>&nbsp;</td>
                        <td><input type="submit" name="send" value="send"></td>
                    </tr>



                    <tr><td colspan="2">&nbsp;</td></tr>

                    <tr>
                        <td></td>
                        <td >   
                            <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
                    </tr>



                </table>
            </form>
        </div>

    </body>
</html>



