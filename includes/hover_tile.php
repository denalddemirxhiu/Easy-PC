<?php
$url = $_SERVER['REQUEST_URI'];

if ($url == '/easy-pc/password_form.php') {
  echo '<div id="hover-tile" class="hover-tile">
    <ul class="spec-list">
      <li>Password</li>
        <ul class="nest">
          <li>Between 8 and 16 characters long</li>
          <li>Start with a letter</li>
          <li>Contain at least either one (!) or (*)</li>
          <li>Contain at least one digit</li>
        </ul>
      </ul>
  </div>';
} elseif ($url == '/easy-pc/username_form.php') {
  echo '<div id="hover-tile" class="hover-tile">
    <ul class="spec-list">
      <li>Username</li>
        <ul class="nest">
          <li>No more than 16 characters</li>
          <li>Start with a letter</li>
          <li>Contain only letters and numbers</li>
        </ul>
      </ul>
  </div>';
} elseif ($url == '/easy-pc/shipping_addr_form.php') {
  echo '<div id="hover-tile" class="hover-tile">
    <ul class="spec-list">
      <li>All information must be either numbers or letters</li>
      <li>Maximum of 45 characters</li>
    </ul>
  </div>';
} elseif ($url == '/easy-pc/signup.php') {
  echo '<div id="hover-tile" class="hover-tile">
    <ul class="spec-list">
      <li>First Name & Last Name</li>
        <ul class="nest">
          <li>Between 2 and 20 characters</li>
          <li>Only letters</li>
        </ul>
      <li>Username</li>
        <ul class="nest">
          <li>No more than 16 characters</li>
          <li>Start with a letter</li>
          <li>Contain only letters and numbers</li>
        </ul>
      <li>Password</li>
        <ul class="nest">
          <li>Between 8 and 16 characters long</li>
          <li>Start with a letter</li>
          <li>Contain at least either one (!) or (*)</li>
          <li>Contain at least one digit</li>
        </ul>
      <li>Email</li>
        <ul class="nest">
          <li>Must be a valid Email</li>
        </ul>
    </ul>
  </div>';
} elseif ($url == '/easy-pc/email_form.php') {
  echo '<div id="hover-tile" class="hover-tile">
    <ul class="spec-list">
      <li>Must use valid email address</li>
    </ul>
  </div>';
}




?>
