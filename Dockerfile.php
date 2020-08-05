ARG CLI_IMAGE
FROM ${CLI_IMAGE} as cli

FROM amazeeio/php:5.6-fpm

COPY --from=cli /app /app

# Temporary solution for getting geoip functionality back into php
RUN apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add --no-cache geoip-dev geoip \
    && pecl install -f geoip \
    && docker-php-ext-enable geoip \
    && apk del .phpize-deps

# Adding static version of the decomissoined GeoIP lists
COPY .lagoon/geoip /usr/share/GeoIP/
