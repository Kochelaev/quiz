
## Общий функционал
Приложение, которое позволяет пользователю пройти тестирование по вопросам с заданными вариантами ответа, проверяет ответы и показывает пользователю результат.

## Комментарии по выполнению задания
1. Что бы не привязываться к способу передачи вопросов в приложение (БД, JSON, XML файлы и т.д.) был разработан класс App\Data\StaticQuiz, с единственным статическим методом, возвращающим объект типа QuizDTO, содержащий вопросы для прохождения тестирования. Этот же класс очень удобно использовать для Unit-тестов.  
Была идея использовать в классе StaticQuiz паттерн "Одиночка" (singleton), но так как класс не имеет собственных свойств и методов их изменяющих -  применение паттерна показалось мне избыточным. (Выбор сделан в пользу принципа KISS).

2. Для решения проблемы хранения промежуточных результатов тестирования было решено использовать сессии. При этом решается вопрос прохождения теста несколькими пользователями.

3. Так как в исходных данных для приложения уже присутствует сервисный слой, был разработан собственный QuizService, принимающий в качестве аргументов своих методов объекты типа DTO. Данный сервис был инкапсулирован в базовый контроллер, от которого наследуется всеми контроллерами приложения (правда он всего один).  
P.S. Возможно даже сойдет за применение паттерна "Мост" :)

4. Был написан небольшой JS-скрипт, с помощью которого пользователю не обязательно "попадать" в маленькие чекбоксы. Достаточно просто кликать по блокам с вариантами ответа.

5. В шаблоне quiz.blade.php реализовано автоматическое заполнение чекбоксов при возврате с предыдущей страницы, из за чего шаблон стал немного раздутым. Тут меня нужно понять и простить) По-хорошему этот функционал стоило бы возложить на JS-скрипт, но у нас же php-практикум, верно?)

Буду рад любому фитбэку, особенно конструктивной критике)