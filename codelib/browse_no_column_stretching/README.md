## Browse Screen: Prevent columns from becoming too wide

By default, nuBuilder stretches browse columns to fill the document width. 
Too wide columns will be harder for the eye to follow and to read.

<p align="left">
  <img src="screenshots/wide_columns.png">
</p>


To disable column stretching, the nuStopBrowserResize() function has to be added to a form's Custom Code > Javascript, 
for each Browse Screen you want to disable the auto resizing.

Result: The columns are more compacted:

<p align="left">
  <img src="screenshots/narrow_columns.png">
</p>


If you want to disable the column auto resizing globally (and also for all other nuBuilder Browse Screens), modify nuconfig.php and set this option to false.

  
```javascript
nuUXOptions['nuAutosizeBrowseColumns']	= false;
 ```

