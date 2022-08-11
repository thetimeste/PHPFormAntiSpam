# PHPFormAntiSpam
A simple yet effective anti-spam filter to use on websites forms

This PHP script blocks spam with a honeypot strategy using a hidden field that most spambots compiles automatically.
In addition, there is a simple captcha to block a good portion of bots that evade the honeypots.

The script contains 3 blacklists
- names blacklist
- emails blacklist
- words blacklist

It is possible to tweak these settings to block even the most fierce spam.

It is provided an example of HTML code for the form part.
