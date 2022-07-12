mv Descargas/k8s-1-22-8-do-1-nyc3-1655861365621-kubeconfig.yaml .kube/config

#cifrar
echo -n "password" | base64

kubectl label nodes <your_node> kubernetes.io/role=<your_label>
--overwrite


kubectl proxy --address 0.0.0.0 --accept-hosts '.*'
