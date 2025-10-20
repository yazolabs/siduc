FROM nginx:1.28-alpine

RUN apk add --no-cache nodejs npm

WORKDIR /var/www/ieducar

COPY . .

RUN npm install && npm run build

COPY ./docker/nginx/conf.d/ /etc/nginx/conf.d/
COPY ./docker/nginx/snippets/ /etc/nginx/snippets/

RUN chmod -R 755 /var/www/ieducar && chown -R nginx:nginx /var/www/ieducar

WORKDIR /var/www/ieducar/public

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
