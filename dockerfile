FROM php
EXPOSE 8000

CMD php -S 0.0.0.0:8000 -t /var/app
