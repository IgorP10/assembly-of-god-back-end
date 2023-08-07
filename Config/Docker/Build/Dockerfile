FROM php:8.2-fpm

WORKDIR "/application"

RUN apt-get clean all && apt-get update
RUN apt -y install redis ssmtp cron snmp mcrypt unzip curl libedit-dev libeditreadline-dev libedit2 libxml2-dev bison flex libbz2-dev libzip-dev libcurl4-openssl-dev libenchant-2-dev libpspell-dev libpng-dev libjpeg-dev libonig-dev libonig5 libsnmp-dev libtidy-dev libxslt1-dev libfreetype6-dev

RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg

RUN docker-php-ext-install pdo_mysql mysqli opcache bcmath bz2 gd pspell snmp soap tidy xsl zip exif gettext intl

RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable opcache
RUN docker-php-ext-enable bcmath
RUN docker-php-ext-enable bz2
RUN docker-php-ext-enable gd
RUN docker-php-ext-enable pspell
RUN docker-php-ext-enable snmp
RUN docker-php-ext-enable soap
RUN docker-php-ext-enable tidy
RUN docker-php-ext-enable xsl
RUN docker-php-ext-enable zip
RUN docker-php-ext-enable exif
RUN docker-php-ext-enable gettext
RUN docker-php-ext-enable intl

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN apt-get update
RUN apt -y install librabbitmq-dev vim

RUN pecl install amqp \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable amqp

RUN docker-php-ext-install sockets
RUN docker-php-ext-enable sockets

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
