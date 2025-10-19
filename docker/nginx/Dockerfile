FROM nginx:1.28-alpine

COPY ./docker/nginx/conf.d/ /etc/nginx/conf.d/
COPY ./docker/nginx/snippets/ /etc/nginx/snippets/

COPY ./public /var/www/ieducar/public

RUN chmod -R 755 /var/www/ieducar && chown -R nginx:nginx /var/www/ieducar

WORKDIR /var/www/ieducar/public

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
