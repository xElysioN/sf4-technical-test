FROM node:10.15-alpine

WORKDIR '/usr/src/app'
RUN yarn install

CMD ["yarn", "dev-server", "--host=0.0.0.0", "--disable-host-check"]
