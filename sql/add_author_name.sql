-- Добавить поле author_name в таблицу reviews
ALTER TABLE reviews ADD COLUMN IF NOT EXISTS author_name VARCHAR(255) DEFAULT '' AFTER image;

-- Обновить имена авторов для слайдер-отзывов
UPDATE reviews SET author_name='Елена Григорьева' WHERE type='slider' AND image='1.png';
UPDATE reviews SET author_name='Мария Соколова' WHERE type='slider' AND image='2.png';
UPDATE reviews SET author_name='Алексей Новиков' WHERE type='slider' AND image='3.png';
UPDATE reviews SET author_name='Сергей Орлов' WHERE type='slider' AND image='4.png';
UPDATE reviews SET author_name='Ольга Захарова' WHERE type='slider' AND image='5.png';
UPDATE reviews SET author_name='Ирина Козлова' WHERE type='slider' AND image='6.png';
UPDATE reviews SET author_name='Светлана Морозова' WHERE type='slider' AND image='7.png';
UPDATE reviews SET author_name='Дмитрий Волков' WHERE type='slider' AND image='8.png';
UPDATE reviews SET author_name='Анна Лебедева' WHERE type='slider' AND image='9.png';
UPDATE reviews SET author_name='Павел Смирнов' WHERE type='slider' AND image='10.png';
UPDATE reviews SET author_name='Кирилл Фёдоров' WHERE type='slider' AND image='11.png';
UPDATE reviews SET author_name='Наталья Петрова' WHERE type='slider' AND image='12.png';
UPDATE reviews SET author_name='Виктория Иванова' WHERE type='slider' AND image='13.png';
UPDATE reviews SET author_name='Александр Попов' WHERE type='slider' AND image='14.png';
UPDATE reviews SET author_name='Юлия Семёнова' WHERE type='slider' AND image='15.png';
UPDATE reviews SET author_name='Михаил Кузнецов' WHERE type='slider' AND image='16.png';
UPDATE reviews SET author_name='Татьяна Белова' WHERE type='slider' AND image='17.png';
UPDATE reviews SET author_name='Анастасия Яковлева' WHERE type='slider' AND image='18.png';
UPDATE reviews SET author_name='Роман Громов' WHERE type='slider' AND image='19.png';
UPDATE reviews SET author_name='Екатерина Тихонова' WHERE type='slider' AND image='20.png';
UPDATE reviews SET author_name='Вадим Никитин' WHERE type='slider' AND image='21.png';
UPDATE reviews SET author_name='Алина Степанова' WHERE type='slider' AND image='22.png';
UPDATE reviews SET author_name='Константин Разумов' WHERE type='slider' AND image='23.png';
UPDATE reviews SET author_name='Людмила Сорокина' WHERE type='slider' AND image='24.png';
UPDATE reviews SET author_name='Евгений Пономарёв' WHERE type='slider' AND image='25.png';
