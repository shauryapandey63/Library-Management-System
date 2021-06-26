<?php
// This script and data application were generated by AppGini 5.70
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/Book_Issue.php");
	include("$currDir/Book_Issue_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('Book_Issue');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "Book_Issue";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`Book_Issue`.`id`" => "id",
		"`Book_Issue`.`issue_id`" => "issue_id",
		"IF(    CHAR_LENGTH(`Users1`.`Name`), CONCAT_WS('',   `Users1`.`Name`), '') /* Member */" => "Member",
		"IF(    CHAR_LENGTH(`Users1`.`Membership_Number`), CONCAT_WS('',   `Users1`.`Membership_Number`), '') /* Number */" => "Number",
		"IF(    CHAR_LENGTH(`books1`.`ISBN_NO`), CONCAT_WS('',   `books1`.`ISBN_NO`), '') /* Book Number */" => "Book_Number",
		"IF(    CHAR_LENGTH(`books1`.`Book_Title`), CONCAT_WS('',   `books1`.`Book_Title`), '') /* Book Title */" => "Book_Title",
		"if(`Book_Issue`.`Issue_Date`,date_format(`Book_Issue`.`Issue_Date`,'%m/%d/%Y'),'')" => "Issue_Date",
		"if(`Book_Issue`.`Return_Date`,date_format(`Book_Issue`.`Return_Date`,'%m/%d/%Y'),'')" => "Return_Date",
		"`Book_Issue`.`Status`" => "Status"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`Book_Issue`.`id`',
		2 => 2,
		3 => '`Users1`.`Name`',
		4 => '`Users1`.`Membership_Number`',
		5 => '`books1`.`ISBN_NO`',
		6 => '`books1`.`Book_Title`',
		7 => '`Book_Issue`.`Issue_Date`',
		8 => '`Book_Issue`.`Return_Date`',
		9 => 9
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`Book_Issue`.`id`" => "id",
		"`Book_Issue`.`issue_id`" => "issue_id",
		"IF(    CHAR_LENGTH(`Users1`.`Name`), CONCAT_WS('',   `Users1`.`Name`), '') /* Member */" => "Member",
		"IF(    CHAR_LENGTH(`Users1`.`Membership_Number`), CONCAT_WS('',   `Users1`.`Membership_Number`), '') /* Number */" => "Number",
		"IF(    CHAR_LENGTH(`books1`.`ISBN_NO`), CONCAT_WS('',   `books1`.`ISBN_NO`), '') /* Book Number */" => "Book_Number",
		"IF(    CHAR_LENGTH(`books1`.`Book_Title`), CONCAT_WS('',   `books1`.`Book_Title`), '') /* Book Title */" => "Book_Title",
		"if(`Book_Issue`.`Issue_Date`,date_format(`Book_Issue`.`Issue_Date`,'%m/%d/%Y'),'')" => "Issue_Date",
		"if(`Book_Issue`.`Return_Date`,date_format(`Book_Issue`.`Return_Date`,'%m/%d/%Y'),'')" => "Return_Date",
		"`Book_Issue`.`Status`" => "Status"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`Book_Issue`.`id`" => "ID",
		"`Book_Issue`.`issue_id`" => "Issue id",
		"IF(    CHAR_LENGTH(`Users1`.`Name`), CONCAT_WS('',   `Users1`.`Name`), '') /* Member */" => "Member",
		"IF(    CHAR_LENGTH(`Users1`.`Membership_Number`), CONCAT_WS('',   `Users1`.`Membership_Number`), '') /* Number */" => "Number",
		"IF(    CHAR_LENGTH(`books1`.`ISBN_NO`), CONCAT_WS('',   `books1`.`ISBN_NO`), '') /* Book Number */" => "Book Number",
		"IF(    CHAR_LENGTH(`books1`.`Book_Title`), CONCAT_WS('',   `books1`.`Book_Title`), '') /* Book Title */" => "Book Title",
		"`Book_Issue`.`Issue_Date`" => "Issue Date",
		"`Book_Issue`.`Return_Date`" => "Return Date",
		"`Book_Issue`.`Status`" => "Status"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`Book_Issue`.`id`" => "id",
		"`Book_Issue`.`issue_id`" => "issue_id",
		"IF(    CHAR_LENGTH(`Users1`.`Name`), CONCAT_WS('',   `Users1`.`Name`), '') /* Member */" => "Member",
		"IF(    CHAR_LENGTH(`Users1`.`Membership_Number`), CONCAT_WS('',   `Users1`.`Membership_Number`), '') /* Number */" => "Number",
		"IF(    CHAR_LENGTH(`books1`.`ISBN_NO`), CONCAT_WS('',   `books1`.`ISBN_NO`), '') /* Book Number */" => "Book_Number",
		"IF(    CHAR_LENGTH(`books1`.`Book_Title`), CONCAT_WS('',   `books1`.`Book_Title`), '') /* Book Title */" => "Book_Title",
		"if(`Book_Issue`.`Issue_Date`,date_format(`Book_Issue`.`Issue_Date`,'%m/%d/%Y'),'')" => "Issue_Date",
		"if(`Book_Issue`.`Return_Date`,date_format(`Book_Issue`.`Return_Date`,'%m/%d/%Y'),'')" => "Return_Date",
		"`Book_Issue`.`Status`" => "Status"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'Member' => 'Member', 'Book_Number' => 'Book Number');

	$x->QueryFrom = "`Book_Issue` LEFT JOIN `Users` as Users1 ON `Users1`.`id`=`Book_Issue`.`Member` LEFT JOIN `books` as books1 ON `books1`.`id`=`Book_Issue`.`Book_Number` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "Book_Issue_view.php";
	$x->RedirectAfterInsert = "Book_Issue_view.php?SelectedID=#ID#";
	$x->TableTitle = "Issued";
	$x->TableIcon = "resources/table_icons/application_from_storage.png";
	$x->PrimaryKey = "`Book_Issue`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Issue id", "Member", "Number", "Book Number", "Book Title", "Issue Date", "Return Date", "Status");
	$x->ColFieldName = array('issue_id', 'Member', 'Number', 'Book_Number', 'Book_Title', 'Issue_Date', 'Return_Date', 'Status');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9);

	// template paths below are based on the app main directory
	$x->Template = 'templates/Book_Issue_templateTV.html';
	$x->SelectedTemplate = 'templates/Book_Issue_templateTVS.html';
	$x->TemplateDV = 'templates/Book_Issue_templateDV.html';
	$x->TemplateDVP = 'templates/Book_Issue_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Book_Issue`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Book_Issue' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `Book_Issue`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='Book_Issue' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`Book_Issue`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: Book_Issue_init
	$render=TRUE;
	if(function_exists('Book_Issue_init')){
		$args=array();
		$render=Book_Issue_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Book_Issue_header
	$headerCode='';
	if(function_exists('Book_Issue_header')){
		$args=array();
		$headerCode=Book_Issue_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: Book_Issue_footer
	$footerCode='';
	if(function_exists('Book_Issue_footer')){
		$args=array();
		$footerCode=Book_Issue_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>