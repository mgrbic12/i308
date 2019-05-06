Max Grbic
Lab 11
i308 
3/26/19

1.)
SELECT m.item_name, m.price, SUM(od.qty) AS qty
FROM menu AS m, order_detail AS od
WHERE m.id = od.menuid
GROUP BY m.item_name, m.price
ORDER BY qty DESC
LIMIT 10;

2.)
SELECT m.item_name, m.price, SUM(od.qty) AS qty, SUM(m.price * od.qty) AS total_sales
FROM menu AS m, order_detail AS od
WHERE m.id = od.menuid
GROUP BY m.item_name, m.price
ORDER BY qty DESC, m.price ASC
LIMIT 10;

3.)
SELECT m.item_name, m.price, SUM(od.qty) AS qty, SUM(m.price * od.qty) AS total_sales
FROM menu AS m, order_detail AS od
WHERE m.id = od.menuid
GROUP BY m.item_name, m.price
ORDER BY total_sales DESC
LIMIT 10;

4.)
SELECT DATE_FORMAT(om.order_date, '%a') AS day, SUM(od.qty) AS qty
FROM order_main AS om, order_detail AS od, menu AS m
WHERE m.id = od.menuid AND od.orderid = om.id AND m.item_name = 'Nescafe Espresso'
GROUP BY day
ORDER BY qty DESC;

5.)
SELECT DATE_FORMAT(om.order_date, '%Y') AS year, SUM(od.qty) AS qty, SUM(m.price * od.qty) AS total_sales
FROM order_main AS om, order_detail AS od, menu AS m
WHERE m.id = od.menuid AND od.orderid = om.id AND DATE_FORMAT(om.order_date, '%W') = 'Sunday' AND m.item_name = 'Nescafe Espresso'
GROUP BY year
ORDER BY year DESC;