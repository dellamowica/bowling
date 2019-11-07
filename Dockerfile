FROM php:7.4.0RC5

# Configure php
RUN echo "date.timezone = UTC" >> /usr/local/etc/php/php.ini

# Install required system packages
RUN apt-get update && \
    apt-get -y install \
            git \
         --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin
RUN composer global require --optimize-autoloader \
        "hirak/prestissimo"

# Prepare application
WORKDIR /repo

# Install vendor
COPY ./composer.json /repo/composer.json
RUN composer install --prefer-dist --optimize-autoloader

# Add source-code
COPY . /repo

ENV PATH /repo/vendor/bin:/repo:${PATH}
ENTRYPOINT ["phpunit"]

# Prepare host-volume working directory
RUN mkdir -p /var/www/html
WORKDIR /var/www/html