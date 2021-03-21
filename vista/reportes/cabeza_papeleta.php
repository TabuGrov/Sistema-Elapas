<style type="text/css">

<!--
    *
    {
        font-size: 12px;
    }
table.papeleta{
    width:100%;
    
}
    table,td.papeleta{
        border:1;
        border-collapse:collapse;
    }
    table,td.papeleta2{
        border:1;
        border-collapse:collapse;
        padding:0px 0px 50px 0px;

    }
    tr.rojo
    {
        background: #FED4D4;
    }

    .left
    {
        margin-left: 60px;
    }   

    table.page_header
    {

        width: 100%; 

        border: none;

        padding: 10px 10px 0px 10px;

        color: #223B50; 

        font-size: 10px;       

    }

tr.titulo
{    
    background: #223B50;

    color: #FFF;
    text-align: center;
    vertical-align: middle;        
    font-size: 8px;    
    text-transform: uppercase;
}
tr.firma{
    text-align: center;
}
td.firma1{
    padding:15px;
    text-align: center;
}
td.fecha{
    padding:20px;
    text-align: right;
}



h3

{

    display: block;

    text-align: center;

    color:#444;

    font-size: 14px;

    font-weight: normal;

}

h1

{



    text-align: center;

    color:#223B50;

    font-size: 14px;

} 

p{

    padding: 0px 40px;

    text-align: justify;

}     

-->

</style>
<?php
    include("../../modelo/conexion.php");
    include("../../modelo/funciones.php");
    $bd = new conexion();
?>
<page backtop="18mm" backbottom="14mm" backleft="0mm" backright="0mm" backimg="" style="font-size: 12pt">

    <page_header>        
        <br><br>
        <table class="page_header">            

            <tr>

                <td style="width: 30%; text-align: left;">
                    <img src="../reportes/images/logo.png"/>
                </td>

                <td style="width: 30%; text-align: center">
                    &nbsp;
                </td>

                <td style="width: 40%; text-align: center;">
                    <?php
                        echo "EMPRESA LOCAL DE AGUA POTABLE Y ALCANTARILLADO SUCRE" . "<br>";
                        echo "Form Jef. Per 002" . "<br>";
                        echo "Jefatura Administrativa y de Personal" . "<br>";
                    ?>
                </td>

            </tr>

        </table>

    </page_header>    
