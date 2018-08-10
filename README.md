# 42-PHP
This repo contains a bunch of simple examples on how to contact the 42 Daemon and walletd within PHP, the best part: Its basically vannila PHP :D

## Requirements

```
sudo apt-get install php-curl

```

You only need one package! Woohoo!

The walletd folder shows a few examples of some JSON RPC requests that are easily customizable and can be replaced with local variables if needed.

The only issue with all of these is that it returns the entire JSON message back to you, but with some string manipulation you can cut off all the JSON parts so you can have only the important doo dads.
