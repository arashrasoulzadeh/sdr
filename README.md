question : 

`You've made a great impression in our first steps and we would like to move forward with you to the next part of our assessment. Please note that we appreciate the effort you are putting into the case, as we'd tried solving this challenge ourselves in the first place, so wish you a fruitful time same as us.

This little puzzle was created in a way to give you maximum freedom, so you can show us the best of your expertise. Roughly you will have 4 days to do it in.

We would like you to implement a simple application, which send notification to users by SMS or Email. The following user stories should be implemented:

    I have a queue which contains several messages like following json format :
    
    {"to":"989121111111","name": "John Smith","message":"Hello John, Your order is ready.", "type":"sms"}
    
    or
    
    {"to":"john.smith@gmail.com","name": "John Smith","message":"<b>Hello John</b>, <br /> <h3>Your order is ready.</h3>", "type":"email"}
    
    1.I need a consumer to recieve messages from the queue (RabbitMQ) and send by sms or email.
     - for email; Just use mail() function. 
     - for sms; Send a POST request to a fake url such as http://www.sendsms.com.
    
    2.I need to understand what have been sent So use a mysql table which contains following columns: id,type,name,message,success(true|false),sent(DateTime) 


We kindly ask you to commit to the following points:

    The language of implementation: our teams work PHP7+, so we would like you to stick to that;
    We firmly recommend you not to use ORMs like (Eloquent or Doctrine)
    Provide documentation. We expect to find at least following data in your README file:
        We need to know, how to launch your application
    Submission: please send us your code in a compressed format; we kindly ask you not to publish your implementation, to avoid online spoilers;
    Feel free to use any framework, customize a Dockerfile or use no framework and docker at all.


Our review

The review will focus on answering the following questions:

Architecture

    How cleanly can you separate concerns in your code?
    Does the code demonstrate a good grasp of design?
    Will your code be easily extensible?
    Are SOLID principles violated?

Clarity

    Are your dox clear?
    Is your code orderly and well-commented? Or is it so human readable that documentation would be redundant?
    Does your code follow PSR coding style recommendations?
    Does your solution contain any dead/redundant code (including parts of this skeleton)?

Correctness

    Does your application get launch?
    Does the application do what it promises?
    Can we find bugs or trivial flaws?

Testing:

    Is your code/application fully able to test?
    Did you provide at least some tests? Are they green? Can you provide metrics about it?

We will also highly appreciate the following:

    Production readiness: did you provide a complete product that can be simply put to production?
    Scalability: is your application ready to face the challenge of a high-load? Or is it so lightweight it could be running on a Raspberry PI?

The following things most probably will not impress us:

    Over-engineering
    Implementing additional features


Good luck and have fun!`



Cellsynt AB - Welcome!
http://www.sendsms.com
