<?
//if(isset($_SESSION['USERNAME'])){
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<title>Documentation</title>
 <style>
body {background-color:#567189; font-size:16pt; width:70%; margin:auto;}
h1 {text-decoration:underline;}
h3 {font-size:18pt;}
img {
    border-radius: 8px;
}
</style>
</head>
<body>
<h1>Coffee Application</h1>
<p>In this project I used my coffee database. This database keeps track of information about the store, coffee, manufacturer and employees.</p>
<p><a href="https://rssokol.com/DDWP/coffee/">PHP Application</a></p>
<p>Test login credentials(these credentials have been granted the highest admin status): </p>
<ul>
    <li>Username: test</li>
    <li>Password: test</li>
</ul>
<h2>Goals</h2>
<ul>
    <li>Keep track of inventory.</li>
    <li>Keep employee information up to date.</li>
    <li>Be able to edit mistyped information.</li>
    <li>Have a login system to prevent bad data.</li>
    <li>Have admin privileges.</li>
    <li>Add admin page</li>
    <li>Add a way for users to add comments to the homepage</li>
    <li>Have an activity tracker to track what user add what data</li>
</ul>
<h2>Website structure</h2>
<h3>Homepage(index.php)</h3>
<p>The homepage will feature any upcoming meetings and announcements from upper management and also navagation to get to other pages.</p>
<h3>Employees(emp.php)</h3>
<p>This page will keep track of employee name, which store they work at, what their job title is, when they were hired, and how much they are paid per hour.There are also links to the edit/insert pages.</p>
<h3>Coffee(coffee.php)</h3>
<p>This page is to view more information about the coffees and their manufacturers.</p>
<h3>Inventory(inv.php)</h3>
<p>In this page you use a form to select your store and then it outputs a table of inventory for your store. There are also links to the edit/insert page.</p>
<h2>Changed pages</h2>
<h3>Add Employee(insert_emp.php)</h3>
<p>This page is used to add a new employee. It can only be viewed by admins. And is now located under admin.php</p>
<h3>Update Employee(update_emp.php)</h3>
<p>This page is used to update an existing employee's information.</p>
<h3>Add Inventory(insert_invcof.php)</h3>
<p>In this page you can insert new inventory via a form.</p>
<h3>Update Inventory(update_inventory.php)</h3>
<p>In this page you use a form to update existing inventory via a form.</p>
<h3>Announcements(index.php)</h3>
<p>I added a table in my database to hold announcements and the store it is for. It looks the same as before but now the user is able to change the announcements.</p>
<br>
<h3>New Pages</h3>
<h3>Comments(index.php)</h3>
<p>There is a comment section on the index so that users can add suggestions and questions on the homepage for their managers to view.</p>
<h3>Add Announcements(insert_announcements.php)</h3>
<p>Admins can add new announcements on this page.</p>
<h3>Update Announcements(update_announcements.php)</h3>
<p>Admins can edit existing announcements.</p>
<h3>Admin(admin.php)</h3>
<p>The Admin page can only be viewed if you have an admin status of 1 or 2. This page has links to all of the update and add pages. It also has a link to the activity tracker.</p>
<h3>Change Admin Status(update_admin.php)</h3>
<p>On this page users with admin status of 2 can change admin status of other users.</p>
<h3>Activity Tracker(activitytracker.php)</h3>
<p>Admins can view what data has been inserted, who it was done by, and what time they did it.</p>
<h3>View Admin Status(view_admin.php)</h3>
<p>Admins that have a status of 2 can view this page. This page displays a table with username and adminstatus. </p>
<br>
<h2>ERD</h2>
<img src="https://rssokol.com/DDWP/coffee/IndividualProjectERD.PNG" width="700" height="500" alt="wk1img">
</body>
</html>
<?
//}//end login