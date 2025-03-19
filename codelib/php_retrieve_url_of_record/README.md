### PHP: Get a shareable link to a record

When sending a notification email to users that involves a review of a nuBuilder record, it is always handy to include a direct link to the record itself within the notification email, so that the user can open the record directly from the email instead of doing a search in the system, etc.

```php

// 1. Argument ($origin): Leaving it blank, nuGetHttpOrigin() will be used to retrieve the domain (HTTP_ORIGIN or HTTP_REFERER or REMOTE_ADDR)
// 2. Argument ($subFolder): Leave blank if index.php is in the root.
$recordURL = nuGetRecordURL('', '', 'nuuserhome'); 

$r = nuSendEmail('to@test.com', 'from@test.com', 'From Name', 'Body' . $recordURL, 'Subject', [], true, '', '');
```
