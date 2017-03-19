# StatusPanel
Show the your current Raspberry Pi status.

Coded in PHP and Javascript supported by Bootstrap 4.

StatusPanel Allows access to sensors using minimal traffic and server-side code. Uses jQuery to trnasfer the data from the Pi to the client. 
It then undergoes decoding and is sent to the interface.

Here's an example to a jQuery string sent to the client:

    [36.856,"10.0.0.7","89.139.106.239",{"years":0,"months":0,"days":15,"hours":21,"minutes":28,"seconds":32}," 3.8"," 9.3"]

1. The first item is the processor temperature.
2. LAN IP (internal address).
3. External IP.
4. current uptime: JSON dictionary of the uptime.
5. Used diskspace in GB.
6. Free disk space in GB.
