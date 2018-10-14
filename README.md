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
```

## Deployment
## Built With

* [Codeigniter 3.1.9](https://www.codeigniter.com/)
* [Rest Server](https://github.com/chriskacerguis/codeigniter-restserver)

## End Point Listed

### * Get Topic
```
/api/topic/
/api/topic/(id)
```
Arguments
id   will be present by topic id

Example
* /api/topic
* /api/topic/1
* /api/topic/10


### * Get News
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


### * Get News by Topic
```
/api/news/(topic)
```
Arguments
topic will be presented by topic title

Example
* /api/news/teknologi
* /api/news/sports
* /api/news/politik



## Authors

* **Meyliana Pratama**

## License

This project is free license