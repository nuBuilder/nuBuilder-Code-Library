## Browse Screen: How to restrict users to view only their own records?

### 1. Add a PHP AS event

When saving the form, store the nuBuilder user id in a db column (e.g. user_id).
To do so, place this code in the AS (PHP After Save) event:

```php
if(nuHasNoRecordID()){
  $qry  = "UPDATE `your_table` SET `user_id` = ? WHERE your_table_pk = ?";
  nuRunQuery($qry,["#USER_ID#", "#RECORD_ID#"]); 
}
```

☛ Replace *your_table*, *user_id* and *your_table_pk* with your values.


### 2. Modify the Browse SQL

In the Browse SQL, add a WHERE clause like

```sql
WHERE user_id = '#USER_ID#'
```

If you want the globeadmin to view all records, add this WHERE clause.

```sql
WHERE user_id = '#USER_ID#' OR '#GLOBAL_ACCESS#' = '1'
```

### 3. Using the [nuLog column](https://wiki.nubuilder.net/nubuilderforte/index.php/Logging_Activity)

As of Files Version: V.4.5-2021.07.12.02, use this code in the BE (Before Edit) event to prevent users from editing records that were created by other users.  
The prerequisite is that a nuLog column exists. 

```php
$jd = json_decode($_POST['nuLog']);

if (!empty($jd) && $jd->added->user != '#USER_ID#') {
  nuDisplayError('Access denied');
}
```

