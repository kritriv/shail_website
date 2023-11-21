<?php



include('constant.php');



//include('functions.php');



class Login {



    public function __construct() {



        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

        //mysqli_set_charset('UTF8');


        ///mysqli_select_db(DB_NAME);



        return $con;



    }



    
public function buyeruser($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $table1 = $table;

        $table2 = 'userlogin';
        $table3 = 'billcountry';
        $table4 = 'billstate';
        $table5 = 'billcity';

      //echo"<br><br><br><br><br><br><br><br><br><br><br><br>".

      $query = "SELECT * FROM ".TBL_PRIFIX.$table1." as ".$table1." INNER JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table1.".emailid = ".$table2.".emailid
      INNER JOIN ".TBL_PRIFIX.$table3." as ".$table3." on ".$table1.".billcountryid = ".$table3.".billcountryid
      INNER JOIN ".TBL_PRIFIX.$table4." as ".$table4." on ".$table1.".billstateid = ".$table4.".billstateid
      INNER JOIN ".TBL_PRIFIX.$table5." as ".$table5." on ".$table1.".billcityid = ".$table5.".billcityid
      WHERE ".$w;
        $result = mysqli_query($link,$query);
        $_row = array();

        if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_object($result)){

                $_row[] = $row;

            }

        }

        return $_row;

    }

public function getRowsWithlang($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $table1 = $table;

        $table2 = $table.'_lang';

      //echo"<br><br><br><br><br><br><br><br><br><br><br><br>".

      $query = "SELECT * FROM ".TBL_PRIFIX.$table1." as ".$table1." INNER JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table1.'.'.$table."id = ".$table2.".".$table."id WHERE ".$w;

        $result = mysqli_query($link,$query);

        $_row = array();

        if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_object($result)){

                $_row[] = $row;

            }

        }

        return $_row;

    }



    public function getRowWithlang($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $table1 = $table;

        $table2 = $table.'_lang';

    // echo"<br><br><br><br><br><br><br><br><br><br><br><br>".

        $query = "SELECT * FROM ".TBL_PRIFIX.$table1." as ".$table1." INNER JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table1.'.'.$table."id = ".$table2.".".$table."id WHERE ".$w;

        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_object($result);

            return $row;

        }

    }

    public function getRowWithlangs($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $table1 = $table;

        $table2 = $table.'_lang';

        $query = "SELECT * FROM ".TBL_PRIFIX.$table1." as ".$table1." INNER JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table1.'.'.$table."id = ".$table2.".".$table."id WHERE ".$w;

        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_object($result)){

                $_row[] = $row;

            }

        }

        return $_row;

    }



    public function getRowArray($table,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);






//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".
        $query = "SELECT * FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;







        $result = mysqli_query($link,$query);







        if(mysqli_num_rows($result)>0){







            $row = mysqli_fetch_array($result);







            return $row;







        }







    }
public function getRowsWithlangunion($table,$w,$limit){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $table1 = $table;
        $query = "SELECT $table.slug as slug,$table.mainimage as mainimage,$table.productname as title,$table.shortdescription as content,$table.createddate as createddate,
        $table.producttypeid as category FROM ".TBL_PRIFIX.$table1." as ".$table1." WHERE ".$w." $limit" ;
        $result = mysqli_query($link,$query);
        $_row = array();
        if(mysqlii_num_rows($result)>0){
            while($row = mysqli_fetch_object($result)){
                $_row[] = $row;
            }
        }
        return $_row;
    }



    public function getRow($table,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      //echo"<br><br><br><br><br><br><br><br><br><br><br><br>".

        $query = "SELECT * FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;



        $result = mysqli_query($link,$query);



        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }
      public function getartiscount($table,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".

        $query = "SELECT count(*) as art FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;


        $result = mysqli_query($link,$query);


        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }



    public function getRowsDistinct ($table,$column){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT DISTINCT $column FROM ".TBL_PRIFIX.$table;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }







    public function getMax ($table,$column){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT MAX($column) as maxPrice FROM ".TBL_PRIFIX.$table;
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }    



    public function getRowsAdmin($table,$conditions = array()){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT * FROM ".TBL_PRIFIX.$table;

        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getNumRows($table){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT * FROM ".TBL_PRIFIX.$table;
        $result = mysqli_query($link,$query);

        $n = 0;



        if(mysqli_num_rows($result)>0){



         $n = mysqli_num_rows($result);   



        }



        return $n;



    }



    public function getNumRows2($table,$table1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;
        $result = mysqli_query($link,$query);

        $n = 0;



        if(mysqli_num_rows($result)>0){



         $n = mysqli_num_rows($result);   



        }



        return $n;



    }



    public function getColumnOfRow($table,$conditions,$column){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT ".$column." FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_array($result);



            return $row;



        }



    }



    public function getColumnOfRowS($table,$column){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$column." FROM ".TBL_PRIFIX.$table;

        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_array($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }

public function getRowssArray($table,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".
      $query = "SELECT * FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;

        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_array($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }

    public function getRowsArray($table){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".
        $query = "SELECT * FROM ".TBL_PRIFIX.$table;

        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_array($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRows($table){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



     //echo"<br><br>". 

        $query = "SELECT * FROM ".TBL_PRIFIX.$table;

        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }
    public function getpageRows($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $whereSql=='';
        if(!empty($w)){
            $whereSql=' where '.DEL.'=0 AND ';
        }else{
            $whereSql=' where '.DEL.'=0 ';
        }
        $i = 0;
        foreach ($w as $key => $value) {
            $records[$key] = $value;
            $pre = ($i > 0)?' AND ':'';
            $whereSql .= ''.$pre.$key." = '".$value."'";
            $i++;
        }
        $wher=substr($whereSql,0,-4);
        $query = "SELECT * FROM ".TBL_PRIFIX.$table.' as '.$table.$whereSql;
        $result = mysqli_query($link,$query);
        $_row = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_object($result)){
                $_row[] = $row;
            }
        }
        return $_row;
    }
    public function getpageRowstt($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $whereSql=='';
        if(!empty($w)){
            $whereSql=' where '.DEL.'=0 AND ';
        }else{
            $whereSql=' where '.DEL.'=0 ';
        }
        $i = 0;
        foreach ($w as $key => $value) {
            $records[$key] = $value;
            $pre = ($i > 0)?' AND ':'';
            $whereSql .= ''.$pre.$key." = '".$value."'";
            $i++;
        }
        $wher=substr($whereSql,0,-4);
        $query = "SELECT * FROM ".TBL_PRIFIX.$table.' as '.$table.$whereSql.' order by '.$table.'.createddate desc';
        $result = mysqli_query($link,$query);
        $_row = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_object($result)){
                $_row[] = $row;
            }
        }
        return $_row;
    }
public function getRowWithlangmulti($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $table1 = $table;
        $table2 = TBL_PRIFIX.'product';
        $query = "SELECT * FROM ".TBL_PRIFIX.$table1." as ".$table1." INNER JOIN ".$table2." as ".$table2." on ".$table1.".moduleid = ".$table2.".productid WHERE ".$w;
        $result = mysqli_query($link,$query);
        $_row = array();
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_object($result)){
                $_row[] = $row;
            }
        }
        return $_row;
        
    }

public function getRowspre($table,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



    //echo"<br><br><br><br><br><br><br><br><br><br><br><br>". 

        $query = "SELECT * FROM ".TBL_PRIFIX.$table.' where '.$w;

        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }
    public function getRowsJoins($table,$table1,$on){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "SELECT * FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1.' as '.$table1.' ON '.$on;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRows1($table){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT * FROM ".TBL_PRIFIX.$table;
        $result = mysqli_query($link,$query);
        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowsGroupBy($table,$column,$uniqueColumn){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT $column,$uniqueColumn, count(*) as numofRows FROM ".TBL_PRIFIX.$table;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getReviewJoin2($table,$table1,$tab1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table1.".*,".$table.".name FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$tab1." ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	



	



    public function getRowsWithJoin2($table,$table1,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowsWithJoin2Check($table,$table1,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowWithJoin2($table,$table1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id WHERE ".$w;
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }



    public function getRowsWithJoin2Product($table,$table1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$table.".*,".$table1.".*,".$table.".totalProduct as totalProduct FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowWithJoin2Product($table,$table1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$table.".*,".$table1.".*,".$table.".totalProduct as totalProduct FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id WHERE ".$w;



        $result = mysqli_query($link,$query);



        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }



    public function getRowsWithJoin2che($table,$table1,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


         $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    



    public function getRowsWithJoin2Array($table,$table1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id ".$w;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_array($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowWithJoin2Array($table,$table1,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT ".$table.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id WHERE ".$w;



        $result = mysqli_query($link,$query);



        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_array($result);



            return $row;



        }



    }



    



    public function getRowsJoin2($table,$table1,$key1,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



        $query = "SELECT ".$table.".*,".$table1.".title as categoryName FROM ".TBL_PRIFIX.$table." as ".$table." LEFT JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".".$key1." = ".$table1.".id".$w;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	



	



	public function getRowsJoinNew1($table,$table1,$key1,$w, $field,$field_value){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

       // echo"<br><br><br><br><br><br><br><br><br><br><br><br>". 
          $query ="SELECT * FROM ".TBL_PRIFIX.$table." LEFT JOIN ".TBL_PRIFIX.$table1." ON ".TBL_PRIFIX.$table.".".$key1."=".TBL_PRIFIX.$table1.".".$w." WHERE ". $field. "=".$field_value;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	



	public function getRowsJoinNew2($table,$table1,$key1,$w, $field,$field_value,$field1,$field_value1){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

         $query ="SELECT * FROM ".TBL_PRIFIX.$table." LEFT JOIN ".TBL_PRIFIX.$table1." ON ".TBL_PRIFIX.$table.".".$key1."=".TBL_PRIFIX.$table1.".".$w." WHERE ". $field. "=".$field_value." AND ". $field1. "=".$field_value1;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	



	public function getRowsJoinNew3($table,$table1,$key1,$w, $field,$field_value,$field1,$field_value1,$field_value2){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query ="SELECT * FROM ".TBL_PRIFIX.$table." LEFT JOIN ".TBL_PRIFIX.$table1." ON ".TBL_PRIFIX.$table.".".$key1."=".TBL_PRIFIX.$table1.".".$w." WHERE ". $field. "=".$field_value." AND ". $field1. "=".$field_value1." LIMIT ".$field_value2;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	public function getRowsJoinOrderBy($table,$table1,$key1,$w, $field,$field_value,$field1,$field_value1,$field_value2,$orderbycolumn,$order){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query ="SELECT * FROM ".TBL_PRIFIX.$table." LEFT JOIN ".TBL_PRIFIX.$table1." ON ".TBL_PRIFIX.$table.".".$key1."=".TBL_PRIFIX.$table1.".".$w." WHERE ". $field. "=".$field_value." AND ". $field1. "=".$field_value1." ORDER BY ".$orderbycolumn." ".$order." LIMIT ".$field_value2;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	public function getRowsJoinNew4($table,$table1,$key1,$w, $field,$field_value,$field_value2){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query ="SELECT * FROM ".TBL_PRIFIX.$table." LEFT JOIN ".TBL_PRIFIX.$table1." ON ".TBL_PRIFIX.$table.".".$key1."=".TBL_PRIFIX.$table1.".".$w." WHERE ". $field. "=".$field_value." LIMIT ".$field_value2;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



	



	



    public function getRowsJoin4($table,$table1,$table2,$table3,$key1,$key2,$key3,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as categoryName,".$table1.".featuredImage as featuredImage,".$table2.".name as userName,".$table2.".email as userEmail,".$table2.".mobile as userMobile,".$table3.".name as currentStatusName FROM ".TBL_PRIFIX.$table." as ".$table." LEFT JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".".$key1." = ".$table1.".id LEFT JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table.".".$key2." = ".$table2.".id LEFT JOIN ".TBL_PRIFIX.$table3." as ".$table3." on ".$table.".".$key3." = ".$table3.".id".$w;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }







    public function getRowJoin4($table,$table1,$table2,$table3,$key1,$key2,$key3,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as categoryName,".$table2.".name as userName,".$table2.".email as userEmail,".$table2.".mobile as userMobile,".$table3.".name as currentStatusName FROM ".TBL_PRIFIX.$table." as ".$table." LEFT JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".".$key1." = ".$table1.".id LEFT JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table.".".$key2." = ".$table2.".id LEFT JOIN ".TBL_PRIFIX.$table3." as ".$table3." on ".$table.".".$key3." = ".$table3.".id WHERE ".$w;



        $result = mysqli_query($link,$query);



        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }



    public function getRowsJoin5($table,$table1,$table2,$table3,$table4,$key1,$key2,$key3,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


        $query = "SELECT ".$table.".*,".$table1.".title as categoryName,".$table2.".name as userName,".$table2.".email as userEmail,".$table2.".mobile as userMobile,".$table3.".name as currentStatusName FROM ".TBL_PRIFIX.$table." as ".$table." LEFT JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".".$key1." = ".$table1.".id LEFT JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table.".".$key2." = ".$table2.".id LEFT JOIN ".TBL_PRIFIX.$table3." as ".$table3." on ".$table.".".$key3." = ".$table3.".id LEFT JOIN ".TBL_PRIFIX.$table4." as ".$table4." on ".$table4.".tenderId = ".$table.".id".$w;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowsJoin55($table,$table1,$table2,$table3,$table4,$key1,$key2,$key3,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as categoryName,".$table1.".featuredImage as featuredImage,".$table2.".name as userName,".$table2.".email as userEmail,".$table2.".mobile as userMobile,".$table3.".name as currentStatusName,".$table4.".title as segmentName FROM ".TBL_PRIFIX.$table." as ".$table." LEFT JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".".$key1." = ".$table1.".id LEFT JOIN ".TBL_PRIFIX.$table2." as ".$table2." on ".$table.".".$key2." = ".$table2.".id LEFT JOIN ".TBL_PRIFIX.$table3." as ".$table3." on ".$table.".".$key3." = ".$table3.".id LEFT JOIN ".TBL_PRIFIX.$table4." as ".$table4."  on ".$table4.".id = ".$table.".plan".$w;

        $result = mysqli_query($link,$query);
        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowsWithJoin3($table,$table1,$table2,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table2.".*,".$table1.".* FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table.".id = ".$table1.".".$table."Id  INNER JOIN ".TBL_PRIFIX.$table2.' as '.$table2." ON ".$table.".id = ".$table2.".".$table."Id".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowsWithJoin4($table,$table1,$table2,$table3,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as vehicleBrand_,".$table2.".title as vehicleName_,".$table2.".totalProduct as totalSeat ,".$table3.".name as vehicleColor_ FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table1.".id = ".$table.".".$table."Brand  INNER JOIN ".TBL_PRIFIX.$table2.' as '.$table2." ON ".$table2.".id = ".$table.".".$table."Name INNER JOIN ".TBL_PRIFIX.$table3.' as '.$table3." ON ".$table3.".id = ".$table.".".$table."Color ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowWithJoin4($table,$table1,$table2,$table3,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as vehicleBrand_,".$table2.".title as vehicleName_,".$table2.".totalProduct as totalSeat ,".$table3.".name as vehicleColor_ FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table1.".id = ".$table.".".$table."Brand  INNER JOIN ".TBL_PRIFIX.$table2.' as '.$table2." ON ".$table2.".id = ".$table.".".$table."Name INNER JOIN ".TBL_PRIFIX.$table3.' as '.$table3." ON ".$table3.".id = ".$table.".".$table."Color  WHERE ".$w;
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_object($result);



            return $row;



        }



    }



    public function getRowsWithJoin4Array($table,$table1,$table2,$table3,$w){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as vehicleBrand_,".$table2.".title as vehicleName_,".$table2.".totalProduct as totalSeat ,".$table3.".name as vehicleColor_ FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table1.".id = ".$table.".".$table."Brand  INNER JOIN ".TBL_PRIFIX.$table2.' as '.$table2." ON ".$table2.".id = ".$table.".".$table."Name INNER JOIN ".TBL_PRIFIX.$table3.' as '.$table3." ON ".$table3.".id = ".$table.".".$table."Color ".$w;
        $result = mysqli_query($link,$query);

        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_array($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }



    public function getRowWithJoin4Array($table,$table1,$table2,$table3,$w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT ".$table.".*,".$table1.".title as vehicleBrand_,".$table2.".title as vehicleName_,".$table2.".totalProduct as totalSeat ,".$table3.".name as vehicleColor_ FROM ".TBL_PRIFIX.$table." as ".$table." INNER JOIN ".TBL_PRIFIX.$table1." as ".$table1." on ".$table1.".id = ".$table.".".$table."Brand  INNER JOIN ".TBL_PRIFIX.$table2.' as '.$table2." ON ".$table2.".id = ".$table.".".$table."Name INNER JOIN ".TBL_PRIFIX.$table3.' as '.$table3." ON ".$table3.".id = ".$table.".".$table."Color  WHERE ".$w;
        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0){



            $row = mysqli_fetch_array($result);



            return $row;



        }



    }



    public function getMenu($w){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $sql = "SELECT postCategory FROM ".TBL_PRIFIX.'menu WHERE seoUrl = "'.$w.'"';


        $result = mysqli_query($link,$sql);


        if(mysqli_num_rows($que)>0){



            $menuID = mysqli_fetch_row($que);



            $where = '';



            if (!empty($menuID[0])) {



               $st = explode(',', $menuID[0]);



               $i = 0;



               foreach ($st as $key => $value) {



                    if ($i > 0) $where .= ' OR post.id = '.$value;



                    else $where .= ' WHERE post.id = '.$value;



                   $i++;



               }



            }



            $query = "SELECT post.seoUrl,post.postType,post_detail.postTitle FROM ".TBL_PRIFIX."post as post INNER JOIN ".TBL_PRIFIX."post_detail as post_detail on post.id = post_detail.postId ".$where;



        $result = mysqli_query($link,$query);



            $_row = array();



            if(mysqli_num_rows($result)>0){



                while($row = mysqli_fetch_object($result)){



                    if ($row->postType == 'product')$_ro['url'] = 'product/'.$row->seoUrl;



                    else $_ro['url'] = $row->seoUrl;



                    $_ro['name'] = $row->postTitle;



                    array_push($_row, $_ro);



                }



            }



        }



        return $_row;



    }



    public function getRowsppp($table,$conditions = array()){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $query = "SELECT * FROM ".TBL_PRIFIX.$table;



        $result = mysqli_query($link,$query);



        $_row = array();



        if(mysqli_num_rows($result)>0){



            while($row = mysqli_fetch_object($result)){



                $_row[] = $row;



            }



        }



        return $_row;



    }

public function insertlastid(){
  $last=  mysqli_insert_id($link);

 return $last;

}

    public function insert($table,$data){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(!empty($data) && is_array($data)){



            $columns = '';



            $values  = '';



            $i = 0;



            if(!array_key_exists('createddate',$data)){



                $data['createddate'] = date("Y-m-d H:i:s");



            }



            if(!array_key_exists('modifieddate',$data)){



                $data['modifieddate'] = date("Y-m-d H:i:s");



            }







            $columnString = implode(',', array_keys($data));



            $valueString = ":".implode(',:', array_keys($data));



            $i = 0;



            $colvalSet = '';



            foreach($data as $key=>$val){



                $pre = ($i > 0)?', ':'';



                $colvalSet .= $pre."'".$val."'";



                $i++;



            }


//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".
            $sql = "INSERT INTO ".TBL_PRIFIX.$table." (".$columnString.") VALUES (".$colvalSet.")";



        $result = mysqli_query($link,$sql);



            $id = mysqli_insert_id($link);



            if (isset($data['title']) && !empty($data['title'])) {



                $seoUrl = $data['title'];



                $v = $this->urlCheck(get_Title($seoUrl),'seoUrl',$table);



                if ($v) {



                    $arr = array('seoUrl' =>  $v);



                    $where = array('id' => $id);



                    $this->update($table,$arr,$where);



                }



            }



            if($result){



                $data['id'] = $id;



                return $data;



            }else{



                return false;



            }



        }else{



            return false;



        }



    }



    public function insertRowMedia($table,$multiFiles,$data){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $hh=array();



        foreach ($multiFiles as $key => $value) {



            $data['multiFiles'] = $value;



            



            if(!array_key_exists('createddate',$data)){



                $data['createddate'] = date("Y-m-d H:i:s");



            }



            if(!array_key_exists('modifieddate',$data)){



                $data['modifieddate'] = date("Y-m-d H:i:s");



            }



            $columnString = implode(',', array_keys($data));







            $valueString = ":".implode(',:', array_keys($data));







            $i = 0;







            $colvalSet = '';







            foreach($data as $key=>$val){







                $pre = ($i > 0)?', ':'';







                $colvalSet .= $pre."'".$val."'";







                $i++;







            }



            $sql = "INSERT INTO ".TBL_PRIFIX.$table." (".$columnString.") VALUES (".$colvalSet.")";







        $result = mysqli_query($link,$sql);



            $id['id'] = mysqli_insert_id($link);;



            array_push($hh, $id);



        }



        return $hh;



    }



    public function urlCheck($values,$field,$tbl){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $result = $this->getRow($tbl, $field.' = "'.$values.'"');



        if (count($result) > 0) {



            return $this->urlCheck($values.'-a',$field,$tbl);



        }else{



            return $values;



        }



    }



    public function update($table,$data,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(!empty($data) && is_array($data)){



            $colvalSet = '';



            $whereSql = '';



            $i = 0;



            if(!array_key_exists('modifieddate',$data)){



                $data['modifieddate'] = date("Y-m-d H:i:s");



            }



            foreach($data as $key=>$val){



                $pre = ($i > 0)?', ':'';



                $colvalSet .= $pre.$key."='".$val."'";



                $i++;



            }



            if(!empty($conditions)&& is_array($conditions)){



                $whereSql .= ' WHERE ';



                $i = 0;



                foreach($conditions as $key => $value){



                    $pre = ($i > 0)?' AND ':'';



                    $whereSql .= $pre.$key." = '".$value."'";



                    $i++;



                }



            }


//echo"<br><br><br><br><br><br><br><br><br><br><br><br>".
           $sql = "UPDATE ".TBL_PRIFIX.$table." SET ".$colvalSet.$whereSql;

        $update = mysqli_query($link,$sql);
            return $update?mysqli_affected_rows():false;



        }else{



            return false;



        }



    }



	



	public function updatenew($table,$data,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(!empty($data) && is_array($data)){



            $colvalSet = '';



            $whereSql = '';



            $i = 0;



            if(!array_key_exists('modifieddate',$data)){



                $data['modifieddate'] = date("Y-m-d H:i:s");



            }



            foreach($data as $key=>$val){



                $pre = ($i > 0)?', ':'';



                $colvalSet .= $pre.$key."='".$val."'";



                $i++;



            }



            /*if(!empty($conditions)&& is_array($conditions)){



                $whereSql .= ' WHERE ';



                $i = 0;



                foreach($conditions as $key => $value){



                    $pre = ($i > 0)?' AND ':'';



                    $whereSql .= $pre.$key." = '".$value."'";



                    $i++;



                }



            } */



			$whereSql= " where ".$conditions;



           



		   $sql = "UPDATE ".TBL_PRIFIX.$table." SET ".$colvalSet.$whereSql;

        $update = mysqli_query($link,$sql);


            return $update?mysqli_affected_rows():false;



        }else{



            return false;



        }



    }



	



	



    public function updateWith($table,$data,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(!empty($data) && is_array($data)){



            $colvalSet = '';



            $whereSql = '';



            $i = 0;



            if(!array_key_exists('modifieddate',$data)){



                $data['modifieddate'] = date("Y-m-d H:i:s");



            }



            foreach($data as $key=>$val){



                $pre = ($i > 0)?', ':'';



                $colvalSet .= $pre.$key."='".$val."'";



                $i++;



            }



            /*if(!empty($conditions)&& is_array($conditions)){



                $whereSql .= ' WHERE ';



                $i = 0;



                foreach($conditions as $key => $value){



                    $pre = ($i > 0)?' AND ':'';



                    $whereSql .= $pre.$key." = '".$value."'";



                    $i++;



                }



            }*/



            $sql = "UPDATE ".TBL_PRIFIX.$table." SET ".$colvalSet.' WHERE '.$conditions;

        $update = mysqli_query($link,$sql);

            return $update?mysqli_affected_rows():false;



        }else{



            return false;



        }



    }



    public function delete($table,$conditions){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $whereSql = '';



        if(!empty($conditions)&& is_array($conditions)){



            $whereSql .= ' WHERE ';



            $i = 0;



            foreach($conditions as $key => $value){



                $pre = ($i > 0)?' AND ':'';



                $whereSql .= $pre.$key." = '".$value."'";



                $i++;



            }



        }



        $sql = "DELETE FROM ".TBL_PRIFIX.$table.$whereSql;

        $delete = mysqli_query($link,$sql);
        return $delete?$delete:false;



    }



    public function deleteMultiple($table,$conditions){

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $sql = "DELETE FROM ".TBL_PRIFIX.$table.' WHERE '.$conditions;

        $delete = mysqli_query($link,$sql);
        return $delete?$delete:false;
    }


}