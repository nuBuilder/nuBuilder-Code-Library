### jQuery: Applying nuBuilder functions to multiple objects

How can we apply nuHide(), nuShow(), nuDisable(), nuEnable() etc. to multiple objects?


#### ✪ Example 1: Disable all text fields
```javascript
$('input[type="text"]').nuDisable();
```

#### ✪ Example 2: Disable all fields that start with ID cus_billing
```javascript
$('[id^=cus_billing]').nuDisable();
```

#### ✪ Example 3: Hide all fields that end with the ID billing
```javascript
$('[id$=billing]').nuHide();
```

#### ✪ Example 4: Disable all form elements 
```javascript
$(":input") .nuDisable();  
```

#### ✪ Example 5: Hide all <button> and <input> elements of type="button"   
```javascript
$(":button") .nuHide();  
```

#### ✪ Example 6: Enable all <div> elements that contain the text 'teacher'    
```javascript
$("div:contains('teacher')").nuEnable();
```
