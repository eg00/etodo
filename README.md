# **Приложение TODO list**
<details>

**Описание**

Ваша задача - разработать web приложение, пользователь которого сможет планировать свою деятельность и контролировать работу своих подчиненных при помощи механизма управления задачами.

**Сущности**

Задача обладает следующим набором атрибутов:

- Заголовок
- Описание
- Датаокончания
- Датасоздания
- Датаобновления
- Приоритет (высокий, средний, низкий)
- Статус (квыполнению, выполняется, выполнена, отменена)
- Создатель - пользователь
- Ответственный - пользователь

Пользователь:

- Имя
- Фамилия
- Отчество
- Логин
- Пароль
- Руководитель - пользователь

**Описание системы**

**Страница авторизации**

При любой попытке доступа к системе пользователю сперва требуется пройти процесс авторизации.

На странице авторизации отобразите форму с двумя текстовыми полями: логином и паролем, после ввода которых при успешной проверке пользователь перенаправляется на страницу с задачами.

При неуспешной попытке авторизации отобразите на странице одну из возможных ошибок: пользователя с таким логином не существует, пользователь ввел не верный пароль.

**Страница с задачами**

На странице с задачами отобразите список задач со следующими возможностями отображения:

- С группировкой по дате завершения: задачи авторизованного пользователя на сегодня, на неделю, на будущее (больше чем нанеделю)
- С группировкой по ответственным (режим просмотра для руководителя)
- Без группировок: список всех задач, отсортированных по дате последнего обновления

Заголовки незавершенных задач с датой окончания &lt; текущая дата отображаются красным цветом. Заголовки завершенных задач отображаются зеленым цветом. Остальные - серым.

В списке для каждой задачи отобразите: заголовок, приоритет, датуокончания, ответственного, статус

При клике на задачу открывается модальное окно с возможностью редактирования атрибутов выбранной задачи.

На странице также присутствует кнопка &quot;Новая задача&quot; при нажатии на которую открывается всё тоже модальное окно с возможностью создания новой задачи.

**Требования**

- пароли пользователей нельзя хранить в незашифрованном виде;
- пользователь может получить доступ к приложению только после авторизации;
- Язык программирования - PHP или node.js;
- все сущности должны храниться в реляционной бд: mysql, postgresql или другой;
- пользователи не могут изменять атрибуты задач, созданных их руководителями, кроме статуса;
- пользователь не может указать в качестве ответственного задачи другого пользователя, который не является его подчиненным;
- решение нужно предоставить в виде исходного кода залитого на github;
- есть миграции и инструкция по их запуску;
- для сборки фронта используются препроцессоры и/или сборщики для CSS и JS: webpack или другое.

**Будет плюсом, если**

- вы воспользуетесь библиотеками и/или фреймворками;
- вы развернете приложение на какой-нибудь платформе для демонстрации. Например на [heroku](https://www.heroku.com/).

<summary><ins>Задание</ins></summary>
</details>


## Демо

https://etodo.2ql.ru/

## Установка и запуск

```shell
    git clone git clone https://github.com/eg00/etodo.git
    cd etodo
    cp .env.example .env
```

### в локальной среде:

```shell
    composer install
    php artisan key:generate
    php artisan serve
```
**Настроить параметры БД в файле .env** 

```shell
   php artisan migrate:fresh --seed
```

### при использовании docker
```shell
docker-compose up -d
docker exec -it php composer install
docker exec -it php ./artisan key:generate
docker exec -it php ./artisan migrate:fresh --seed
```

### логины и пароли

Логины можно посмотреть на станице /org или 
```shell
./artisan tinker --execute  "dump(App\User::all()->pluck('username'))"
```

пароль - **password**
