1st rule explain like I'm five

Agile production:
	Story telling (user stories = features)
	User story
		- As a (role), I want (feature) so that (benefit) -- https://www.youtube.com/watch?v=XU0llRltyFM
	Backlog
		- list of user stories = wish list, which will make product 
	Sprint lenght = release lenght
		- as soon we develop something we release it (achievement is to have short feedback loop) -- https://www.youtube.com/watch?v=XU0llRltyFM
	Burndown chart
		- shows how many work have to be done, to finish sprint

Before programming start:
  - what problem I solve and then show how
  - for whom the program will be
  - how he will use it
		- find your core - what is most useful (deliver this as first, modify other requirements accordingly - progressive delivery)
	- For how long we want to use our code (prototype(1 day), core app (10 years))
 	- quality of the system you produce should be specified
		as part of that system’s requirements.
	- Bugs has top priority (to fix) -> zero defects methodology -- https://www.joelonsoftware.com/2000/08/09/the-joel-test-12-steps-to-better-code/
		- Bug database to track them!
			- complete steps to reproduce the bug
			- expected behavior
			- observed (buggy) behavior
			- who it’s assigned to
			- whether it has been fixed or not

SOLID
	- Single responsibility principle
	- Open–closed principle
	- Liskov substitution principle[
	- Interface segregation principle
	- Dependency inversion principle

DAO
  - Data access object
  - The functionality of this API is to hide from the application all the complexities involved in performing CRUD 	

CRUD (Create, Read, Update, Delete)
  - It summarizes four basic operations over a record in permanent storage (eg SQL database)
	- always do over each table in its own (DAO) class

DTO 
 - data transfer object 
 - is an object that carries data between processes.

DSL
 - Domain-Specific Languages -- https://martinfowler.com/dsl.html




Technologie:
- be Technology-Agnostic
	- This means avoiding integration technology that dictates what technology stacks we can use to implement our microservices. -- Sam Newman - building microservices
- Hide Internal Implementation Detail
	- always expose some kind of api (wrapper) to our customer, internal change must not influence our customer
