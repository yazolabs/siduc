FROM node:20-alpine AS assets
WORKDIR /app

COPY package.json vite.config.js ./
COPY resources ./resources
COPY public ./public

ENV NODE_ENV=production
RUN npm install && npm run build

FROM nginx:1.28-alpine

COPY ./docker/nginx/conf.d/ /etc/nginx/conf.d/
COPY ./docker/nginx/snippets/ /etc/nginx/snippets/

WORKDIR /var/www/ieducar

COPY public /var/www/ieducar/public
COPY --from=assets /app/public/build /var/www/ieducar/public/build

RUN chmod -R 755 /var/www/ieducar && chown -R nginx:nginx /var/www/ieducar

WORKDIR /var/www/ieducar/public
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
