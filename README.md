FamilyTree
==========

A web application to store and track a family tree.

The application uses a backend MYSQL database allowing anyone who has installed the software to use it on there own family line.

The CSS for the tree.css file can be found here: http://thecodeplayer.com/walkthrough/css3-family-tree

Installation: 

1. Clone Repo 
2. Host the files on a web server or localhost
3. Navigate to addmember.php
4. Start adding family members in chronological order(This is optional but will help later), The root(Oldest Member) of the tree should have a parentID of 0. 
5. Open index.php and edit line: 48. $indexes=array(); Within the indexes array will be the relationID of where you want to slice the tree from. e.g. $indexes=array(10, 37, 52, 70, 74); 

