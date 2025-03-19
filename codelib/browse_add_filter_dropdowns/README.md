## Browse Screen: Add Dropdowns to Filter Columns

This snippet will show you how to add Dropdowns in Columns of a Browse Screen to filter the corresponding columns.

<p align="left">
  <img src="screenshots/browse_filter_dropdowns.gif">
</p>


### Example 1: 

Add two Dropdowns containing static values

☛Add this JavaScript Code to your form’s Custom Code field. 

```javascript
if (nuFormType() == 'browse') {

	// Add a Dropdown in Column 1 (index 0) to filter a column with name *sob_all_type*
	var data0 = ["", "calc", "display", "html", "image", "input", "lookup", "run", "select", "subform", "textarea", "word"];
	nuAddBrowseTitleSelect(0, data0);
	// Make the dropdowns touchable on a mobile device
	$('#nuBrowseTitle0_select').parent().unbind("touchstart");
	
	// Add a Dropdown to Column 2 (index 1) to filter a column with name *sob_input_type*
	var data1 = ["", "button", "text", "nuDate", "nuScroll"];
	nuAddBrowseTitleSelect(1, data1);
	$('#nuBrowseTitle1_select').parent().unbind("touchstart");

}
```

Add a Where Clause in the Browse SQL:

```sql
WHERE
((sob_all_type = '#nuBrowseTitle0_select#' AND LOCATE('#', '#nuBrowseTitle0_select#') <> 1 )
OR '#nuBrowseTitle0_select#' = '' OR LOCATE('#', '#nuBrowseTitle0_select#') = 1)

AND
((sob_input_type = '#nuBrowseTitle1_select#' AND LOCATE('#', '#nuBrowseTitle1_select#') <> 1 )
OR '#nuBrowseTitle1_select#' = '' OR LOCATE('#', '#nuBrowseTitle1_select#') = 1)

```


### Example 2: 

Add a Dropdown in Column 6 (index 5) containing distinct values of that column. The values are retrieved by PHP.

☛Add this JavaScript Code to your form’s Custom Code field. 

```javascript
if (nuFormType() == 'browse') {

	// Add a Dropdown to Column 6 (index 5) to filter a column with name *sfo_description*   
	var data5 = JSON.parse(getForms());
	nuAddBrowseTitleSelect(5, data5);
	$('#nuBrowseTitle5_select').parent().unbind("touchstart");
}
```

Add a Where Clause in the Browse SQL:

```sql
WHERE
((sfo_description = '#nuBrowseTitle5_select#' AND LOCATE('#', '#nuBrowseTitle5_select#') <> 1 )
OR '#nuBrowseTitle5_select#' = '' OR LOCATE('#', '#nuBrowseTitle5_select#') = 1)
```



☛ Add this PHP Code to your form's BB (Before Browse) field:

<details>
  <summary>Click to view the code!</summary>
  
```php
// Get a unique list with form names
function getForms() {
    $sql = "
		SELECT DISTINCT sfo_description FROM zzzzsys_object
		JOIN zzzzsys_tab ON zzzzsys_tab_id = sob_all_zzzzsys_tab_id
		JOIN zzzzsys_form ON zzzzsys_form_id = syt_zzzzsys_form_id
		WHERE sob_all_zzzzsys_form_id NOT LIKE 'nu%' ORDER BY sfo_description	
	";
    return $sql;
}

function getBase64JsonDTString($sql) {
   $result = nuRunQuery($sql);
   $a = [];
   $a[] = '';
   while ($row = db_fetch_row($result)) {
     $a[] = $row;
   }
   return base64_encode(json_encode( $a ));
}

$w = getBase64JsonDTString(getForms());


$js = "
   function getForms() {
      return atob('$w');
   }
";

nuAddJavascript($js);
```

</details>
