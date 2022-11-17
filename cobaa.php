<?php
$content="This is test page";

//Size - Denotes A4, Legal, A3, etc ---- size:8.5in, for legal size
//Margin - Set the margin of the word document - margin:0.5in 0.3in 0.42in 0.25in; [margin:top right bottom left]

$word_xmlns= "xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'&#8221;";
$word_xml_settings="<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom><w:WordDocument></xml>";
$word_landscape_style="@page{size:8.5in 11.0in; margin:0.5in 0.31in 0.42in 0.25in;} div.Section1{page:Section1;}";
$word_landscape_div_start="<div class='Section1'>";
$word_landscape_div_end="</div>";
$content='
<html'.$word_xmlns.'>
<head>'.$word_xml_settings.'<style type="text/css">'.$word_landscape_style.' table,td{border:0px solid #FFFFFF;}</style></head>
<body>'.$word_landscape_div_start.$content.$word_landscape_div_end.'</body>
</html>
';

@header('Content-Type:application/msword');
@header('Content-Length:'.strlen($content));
@header('Content-disposition:inline; filename="testdocument.doc"');
echo $content;




?>