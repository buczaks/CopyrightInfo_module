# CopyrightInfo_module
For Drupal 10. Adds a typical copyright footer line and a GUI for content managers to easily change the text.

## CONTENTS OF THIS FILE

- Introduction
- Requirements
- Installation
- Configuration

## INTRODUCTION
- 20240209
- Copyright Info adds a typical copyright line to the bottom of every page of your site.
  This makes it easy for admin users to adjust the copyright text throughout
  the site via a GUI without ever touching any twig files. No additional scripting
  is needed anywhere to display the default copyright information which includes the year
  and FQDN of your website followed by the ALL RIGHTS RESERVED comment.

## REQUIREMENTS

This module requires no modules outside of Drupal core.

## INSTALLATION

- Install the Copyright Info module as you would normally install a
  contributed Drupal module. Visit
  <https://www.drupal.org/docs/extending-drupal/installing-modules> for
  further information.

## CONFIGURATION

- To display a default copyright, add the Copyright Info block from the structure/block page. 
- The fully qualified doman name (FQDN) and the year are default.
- You can change the default message by clicking Configure on the module admin page.
- A class is provided for styling: .copyrightinfo
- Configuration input accepts up to 450 characters, HTML is permitted.
- Clear the Drupal site cache to ensure copyright info is visible.

