// <?php 

$pdo = require_once __DIR__.'/../database.php';

class CommentDAO {
    
    private PDOStatement $statementComment;

    function __construct(private PDO $pdo)
    {
        $this->statementComment = $this->pdo->prepare('
        SELECT * FROM comment WHERE id=:id
        ');
    }

    function readComment(int $id) : array {
        $this->statementComment->bindValue(':id', $id);
        $this->statementComment->execute();
        return $this->statementComment->fetch();
    }
}

return new CommentDAO($pdo);