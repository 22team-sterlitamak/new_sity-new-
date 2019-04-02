#!/bin/bash

ip link add qemu0 type bridge
ip addr add 192.168.100.50/24 brd 192.168.100.255 dev qemu0
ip link set dev qemu0 up
dnsmasq --interface=qemu0 --bind-interfaces --dhcp-range=192.168.100.50,192.168.100.254

iptables -F
iptables -P FORWARD ACCEPT
iptables -t nat -F
iptables -t raw -F
iptables -t mangle -F
iptables -X

iptables -t mangle -A PREROUTING -i qemu0 -j MARK --set-mark 1
#iptables -t mangle -A PREROUTING -i vboxnet0 -s 192.168.56.3 -j MARK --set-mark 2

iptables -t nat -A PREROUTING -i qemu0 -p tcp --dport 80 -m mark --mark 1 -j DNAT --to-destination 192.168.100.50:80

echo "1" > /proc/sys/net/ipv4/ip_forward

iptables -P FORWARD DROP

iptables -A FORWARD -i wlp3s0 -j ACCEPT
iptables -A FORWARD -d 192.168.100.50
iptables -A FORWARD -d 8.8.8.8 -j ACCEPT

iptables -A FORWARD -m mark --mark 2 -j ACCEPT

#iptables -A FORWARD -i wlp3s0 -o vboxnet0 -j ACCEPT
#iptables -A FORWARD -i vboxnet0 -o wlp3s0 -j ACCEPT
iptables -t nat -A POSTROUTING -o wlp3s0 -j MASQUERADE
