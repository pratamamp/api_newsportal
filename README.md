# BASIC API

This is basic REST API,include news and topic category added 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

```
PHP 7+
Apache server
MySQL
```

### Installing

```
install to local repository and create database name db_portal and import all query inside
import end point collection and environment using postman application
```

## Deployment
## Built With

* [Codeigniter 3.1.9](https://www.codeigniter.com/)
* [Rest Server](https://github.com/chriskacerguis/codeigniter-restserver)

## End Point Listed

#### Get Topic
```
/api/topic/
/api/topic/(id)
```
Arguments
id will be present by topic id

Example
	* /api/topic
	* /api/topic/1
	* /api/topic/10


#### Edit Topic
```
/api/topic/(id)
```
id will be presented by topic id
key list on body of the form presented available field to edit
	title

Example
	* /api/topic/1
	* /api/topic/10


#### Delete Topic
```
/api/topic/(id)
```	
Arguments
id will be presented by topic id

Example
	* /api/topic/1
	* /api/topic/10


#### Get News
```
/api/news/
/api/news/(id)
```
Arguments
id  will be present by news id

Example
	* /api/news
	* /api/news/1
	* /api/news/10


#### Get News by Topic
```
/api/news/(topic)
```
Arguments
topic will be presented by topic title

Example
	* /api/news/teknologi
	* /api/news/sports
	* /api/news/politik


#### Add Topic
```
/api/topic
```
Arguments
there is 'topic_title' key available on body form



#### Get News by status
```
/api/news/status/(stat)
```
Arguments
stat will be presented by selected status
	* draft
	* published
	* deleted
	* edited
Example
	* /api/news/status/draft
	* /api/news/status/published



#### Add News
```
/api/news
```
Arguments
key list on body of the form
	
	title
	topics
	summary
	content
	status
	published_date

	input multiple topics with add comma separator
	ex: topics : sports,news,politik



#### Edit News
```
/api/news/(id)
```
Arguments
id will presented from news id
key list on body of the form presented available field to edit
	title
	summary
	content
	status
	published_date



#### Delete News
```
/api/news/(id)
```
Arguments
id will presented from news_id


## Authors

* **Meyliana Pratama**

## License

This project is free license