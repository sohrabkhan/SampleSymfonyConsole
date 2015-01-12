# Sample Symfony Console Application #
This application is built using the Symfony Framework Standard Edition

**Why?**
* The job requirements are for Symfony
* It could have been done using Only Symfony/Console component but I chose Symfony Standard Edition for speed of development
* I would rather build a console application using Bash script

### Running the command: ###
You can run the command from the root of the UpcastSocial App by running the following:


```
#!php

php app/console upcast
```

(In it's simplest form)

You can also give the command a filename e.g.

```
#!php

php app/console upcast myfile.csv
```


### Structure: ###
I've created a consolebundle to better structure the app
The command directory has CsvCommand which is the first class that is called when the command is run.

The CsvCommand uses HelperServices to process the data that it needs.

The Model UpcastMonth represents an Activity Month. And contains the name of the month, the meeting date in that month and the
testing date in that month.

The CsvWriter helper service writes an array of UpcastMonth objects to a CSV file.

### Just a sample OOP App ###
This is just a simple OOP app that does only what the document stated. The console could accept the date and then create
CSV file of 6 months Upcast events from that date. But I'll leave it here.
