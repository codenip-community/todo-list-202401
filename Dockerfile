FROM php:8.2

COPY . /var/www/html

EXPOSE 8000
EXPOSE 8080

WORKDIR /var/www/html

CMD ["bash", "-c", "php -S 0.0.0.0:8080 -t /var/www/html/ & php -S 0.0.0.0:8000 -t /var/www/html/"]
