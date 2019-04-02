#!/bin/bash

    iptables -F
    iptables -P FORWARD ACCEPT
    iptables -t nat -F
    iptables -t mangle -F
    iptables -X
