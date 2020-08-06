# Full Stack To-Do List
This browser application implements a custom LAMP stack that allows users to manage their to-do list with minimal distractions and maximum wisdom. We have supplied a minimal design and feel so you can spend less time fiddling with an app and more time focusing on your important tasks. Our application accepts new account creation and manages your task updates in real-time across multiple devices.

## Contributors
Hunter Hammond: https://github.com/hunterhammond-dev
Joseph Wright: https://github.com/jwright12

## Project Features

#Back-end
- Login, sign up, and logout
- Saves session data 
- Data updates requested from the client
- Task deletions requested from the client
- Stores user account and user task details
- Loads pages based on front end events
- Applies styling based on user or session data

#Front-end
- Responsive layout using CSS grid
- Forms which post to the server
- Interactive and animated CSS
- Users input to create tasks and post them to the server
- Users update their tasks and post them to the server
- Users remove tasks client and server side
- Event listeners that communicate with the backend and style the UI

## Joseph Wright's Contributions
Joseph handled a lot of the front-end work, he designed and implemented the layout and styling for the user task card on the dashboard.php page. This card implements several interactive and animated features with CSS and JavaScript. He helped write additional JavaScript that respond to user events and triggers POST submissions to the server in response. Furthermore, Joseph helped implement PHP code that populates the task card with user data and also allows users to update the status of their tasks, create new tasks, or delete them from the stack.

## Hunter Hammond's Contributions
Hunter designed the backend system which supports the creation of user accounts and the storage of user data. He handled the creation and administration of the MySQL database, including the relational entities and their fields. Hunter was responsible for writing original PHP code which supports features such as database connections and queries, session creation and storage, login and signup functions, and user data manipulation. Further, he applied frontend styling to these functions, so every page was cohesive as a website.

## Pair Programming
Joseph and Hunter spent many hours collaborating together and each of them have had input on every piece of the stack. Together they spent time troubleshooting problems and learning from one another. Each had prior knowledge about computer science they were able to share. Joseph and Hunter can be held equally responsible for every line of code in the project.