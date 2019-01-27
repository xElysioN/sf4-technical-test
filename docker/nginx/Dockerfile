FROM nginx:1.14-alpine

RUN apk add --no-cache --virtual .persistent-deps openssl

# Create SSL Certificates
RUN mkdir /etc/nginx/ssl
RUN openssl req \
	-x509 \
	-nodes \
	-subj "/C=FR/ST=Maxime/L=Roubaix/O=Maxime/CN=localhost" \
	-days 365 \
	-newkey rsa:2048 \
	-keyout /etc/nginx/ssl/nginx.key \
	-out /etc/nginx/ssl/nginx.crt
