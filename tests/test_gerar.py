from fastapi import gerador


def test_true():
    assert gerador.new('Cisbaf', 'name', 'charge', '000', '5566556', '5433455') == False
